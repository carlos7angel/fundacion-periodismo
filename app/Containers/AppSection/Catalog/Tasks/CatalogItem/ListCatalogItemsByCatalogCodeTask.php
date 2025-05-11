<?php

namespace App\Containers\AppSection\Catalog\Tasks\CatalogItem;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Catalog\Data\Repositories\CatalogItemRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCatalogItemsByCatalogCodeTask extends ParentTask
{
    public function __construct(
        private readonly CatalogItemRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($_catalog_code): mixed
    {
        return $this->repository->findWhere(['catalog_code' => $_catalog_code])->addRequestCriteria()->all();
    }
}
