<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Containers\Monitoring\Denunciation\Tasks\FindDenunciationByIdTask;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\FindDenunciationByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindDenunciationByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindDenunciationByIdTask $findDenunciationByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindDenunciationByIdRequest $request): Denunciation
    {
        return $this->findDenunciationByIdTask->run($request->id);
    }
}
