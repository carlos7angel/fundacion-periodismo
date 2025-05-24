<?php

namespace App\Containers\Monitoring\Report\Tasks;

use App\Containers\Monitoring\Report\Data\Repositories\ReportRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindReportByYearAndQuarterTask extends ParentTask
{
    public function __construct(
        private ReportRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($_year, $_quarter): mixed
    {
        try {
            return $this->repository->findWhere(['year' => (int) $_year, 'quarter' => $_quarter, 'type' => 'TRIMESTRAL'])->all();
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
