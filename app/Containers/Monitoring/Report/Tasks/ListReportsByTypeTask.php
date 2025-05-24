<?php

namespace App\Containers\Monitoring\Report\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Report\Data\Repositories\ReportRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListReportsByTypeTask extends ParentTask
{
    public function __construct(
        private ReportRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($_type): mixed
    {
        $result = $this->repository->scopeQuery(function ($query) use ($_type) {
            $query = $query->where('type', '=', $_type);
            return $query->distinct()->select(['reports.*']);
        });

        $result->orderBy('year', 'desc');

        return $result->all();
    }
}
