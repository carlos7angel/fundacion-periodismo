<?php

namespace App\Containers\Monitoring\Report\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\AppSection\FileManager\Tasks\CreateFileTask;
use App\Containers\Monitoring\Report\Models\Report;
use App\Containers\Monitoring\Report\Tasks\CreateReportTask;
use App\Containers\Monitoring\Report\Tasks\FindReportByYearAndQuarterTask;
use App\Containers\Monitoring\Report\Tasks\FindReportByYearTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\DB;
use App\Ship\Parents\Requests\Request;

class CreateReportAction extends ParentAction
{
    public function __construct(
        private CreateReportTask $createReportTask,
        private CreateFileTask $createFileTask,
        private FindReportByYearTask $findReportByYearTask,
        private FindReportByYearAndQuarterTask $findReportByYearAndQuarterTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): Report
    {
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        if (! $request->file('file_report')) {
            throw new CreateResourceFailedException('Complete el formulario. El archivo es obligatorio');
        }

        $data['type'] = $request->get('document_type') ?? null;
        $data['year'] = $request->get('document_year') ?? null;

        if ($data['type'] === 'ANUAL') {
            $data['quarter'] = null;
            $storage_type = 'report-yearly';
            $exist_data = $this->findReportByYearTask->run($data['year']);
        } else {
            $data['quarter'] = $request->get('document_quarter') ?? null;
            $storage_type = 'report-quarterly';
            $exist_data = $this->findReportByYearAndQuarterTask->run($data['year'], $data['quarter']);
        }

        if (count($exist_data) > 0) {
            throw new CreateResourceFailedException('Ya existe un registro con la misma gestión y/o trimestre.');
        }

        $user = app(GetAuthenticatedUserTask::class)->run();
        // $data['created_by'] = $user->id;

        return DB::transaction(function () use ($data, $request, $user, $storage_type) {

            $report = $this->createReportTask->run($data);

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
