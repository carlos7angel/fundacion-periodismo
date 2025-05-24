<?php

namespace App\Containers\Monitoring\Report\Actions;

use App\Containers\Monitoring\Report\Models\Report;
use App\Containers\Monitoring\Report\Tasks\FindReportByIdTask;
use App\Containers\Monitoring\Report\UI\WEB\Requests\FindReportByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindReportByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindReportByIdTask $findReportByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindReportByIdRequest $request): Report
    {
        return $this->findReportByIdTask->run($request->id);
    }
}
