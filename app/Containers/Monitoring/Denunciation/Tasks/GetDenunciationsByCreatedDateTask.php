<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetDenunciationsByCreatedDateTask extends ParentTask
{
    public function __construct(
        private DenunciationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($_date)
    {
        $result = $this->repository->scopeQuery(function ($query) use ($_date) {
            $query = $query->whereDate('created_at', '>=', $_date . ' 00:00:00')
                            ->whereDate('created_at', '<=', $_date . ' 23:59:59');
            return $query->distinct()->select(['denunciations.*']);
        });

        return $result;
    }
}
