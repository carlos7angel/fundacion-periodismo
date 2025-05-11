<?php

namespace App\Containers\AppSection\Catalog\Tasks\Catalog;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Catalog\Data\Repositories\CatalogRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCatalogsTask extends ParentTask
{
    public function __construct(
        private readonly CatalogRepository $repository,
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
