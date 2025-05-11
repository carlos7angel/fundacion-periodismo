<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Containers\Monitoring\Denunciation\Tasks\CreateDenunciationStatusActivityTask;
use App\Containers\Monitoring\Denunciation\Tasks\FindDenunciationByIdTask;
use App\Containers\Monitoring\Denunciation\Tasks\UpdateDenunciationTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateStatusDenunciationAction extends ParentAction
{
    public function __construct(
        private UpdateDenunciationTask $updateDenunciationTask,
        private CreateDenunciationStatusActivityTask $createDenunciationStatusActivityTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): Denunciation
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $user = app(GetAuthenticatedUserTask::class)->run();
        $denunciation = app(FindDenunciationByIdTask::class)->run($request->id);

        $new_status = $request->denunciation_status;

        $data_transaction = [
            'fid_denunciation' => $denunciation->id,
            'status' => $new_status,
            'previous_status' => $denunciation->status,
            'registered_by' => $user->id,
            'observations' => $request->denunciation_observations,
            'registered_at' => Carbon::now()->toDateTimeString()
        ];

        return DB::transaction(function () use ($new_status, $denunciation, $data_transaction) {

            $data = [
                'status' => $new_status,
                'updated_at' => Carbon::now()->toDateTimeString()
            ];
            $denunciation = $this->updateDenunciationTask->run($data, $denunciation->id);

            $activity = $this->createDenunciationStatusActivityTask->run($data_transaction);

            return $denunciation;
        });

    }
}
