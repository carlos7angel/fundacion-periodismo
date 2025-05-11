<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationType;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListViolationTypesTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeRepository $repository,
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
