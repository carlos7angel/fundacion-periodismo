<?php

namespace App\Containers\Monitoring\Report\Tasks;

use App\Containers\Monitoring\Report\Data\Repositories\ReportRepository;
use App\Containers\Monitoring\Report\Models\Report;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindReportByIdTask extends ParentTask
{
    public function __construct(
        private readonly ReportRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Report
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
