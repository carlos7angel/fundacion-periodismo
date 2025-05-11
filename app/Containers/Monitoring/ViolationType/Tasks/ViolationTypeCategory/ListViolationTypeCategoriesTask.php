<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeCategoryRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListViolationTypeCategoriesTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeCategoryRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->findWhere(['active' => true])->all();
    }
}
