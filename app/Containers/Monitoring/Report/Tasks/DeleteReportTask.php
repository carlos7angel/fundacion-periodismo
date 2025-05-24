<?php

namespace App\Containers\Monitoring\Report\Tasks;

use App\Containers\Monitoring\Report\Data\Repositories\ReportRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteReportTask extends ParentTask
{
    public function __construct(
        private readonly ReportRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}
