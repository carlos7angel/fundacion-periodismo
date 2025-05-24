<?php

namespace App\Containers\Monitoring\Report\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Report\Data\Repositories\ReportRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListReportsTask extends ParentTask
{
    public function __construct(
        private readonly ReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
