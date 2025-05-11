<?php

namespace App\Containers\AppSection\Localization\Tasks\State;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Localization\Data\Repositories\StateRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListStatesTask extends ParentTask
{
    public function __construct(
        private readonly StateRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->all();
    }
}
