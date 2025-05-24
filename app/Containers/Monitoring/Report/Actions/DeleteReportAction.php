<?php

namespace App\Containers\Monitoring\Report\Actions;

use App\Containers\Monitoring\Report\Tasks\DeleteReportTask;
use App\Containers\Monitoring\Report\UI\WEB\Requests\DeleteReportRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteReportAction extends ParentAction
{
    public function __construct(
        private readonly DeleteReportTask $deleteReportTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteReportRequest $request): int
    {
        return $this->deleteReportTask->run($request->id);
    }
}
