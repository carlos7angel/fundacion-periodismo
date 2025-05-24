<?php

namespace App\Containers\Monitoring\Report\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\AppSection\FileManager\Tasks\CreateFileTask;
use App\Containers\Monitoring\Report\Models\Report;
use App\Containers\Monitoring\Report\Tasks\FindReportByIdTask;
use App\Containers\Monitoring\Report\Tasks\UpdateReportTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\DB;

class UpdateReportAction extends ParentAction
{
    public function __construct(
        private UpdateReportTask $updateReportTask,
        private CreateFileTask $createFileTask,
        private FindReportByIdTask $findReportByIdTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): Report
    {
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $report = $this->findReportByIdTask->run($request->document_id);

        $user = app(GetAuthenticatedUserTask::class)->run();

        if ($report->type === 'ANUAL') {
            $storage_type = 'report-yearly';
        } else {
            $storage_type = 'report-quarterly';
        }

        $data = [];

        return DB::transaction(function () use ($data, $request, $user, $storage_type, $report) {

            if ($request->file('file_report')) {
                $file_report = $this->createFileTask->run(
                    $request->file('file_report'),
                    $storage_type,
                    $report->id,
                    $user
                );
                $report->file_report = $file_report->unique_code;
                $report->save();
            }

            return $report;

        });

    }
}
