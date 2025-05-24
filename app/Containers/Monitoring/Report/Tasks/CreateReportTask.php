<?php

namespace App\Containers\Monitoring\Report\Tasks;

use App\Containers\Monitoring\Report\Data\Repositories\ReportRepository;
use App\Containers\Monitoring\Report\Models\Report;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateReportTask extends ParentTask
{
    public function __construct(
        private ReportRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Report
    {
//        try {
            return $this->repository->create($data);
//        } catch (\Exception) {
//            throw new CreateResourceFailedException();
//        }
    }
}
