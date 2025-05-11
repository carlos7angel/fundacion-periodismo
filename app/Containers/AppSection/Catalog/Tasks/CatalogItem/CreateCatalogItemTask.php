<?php

namespace App\Containers\AppSection\Catalog\Tasks\CatalogItem;

use App\Containers\AppSection\Catalog\Data\Repositories\CatalogItemRepository;
use App\Containers\AppSection\Catalog\Models\CatalogItem;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateCatalogItemTask extends ParentTask
{
    public function __construct(
        private readonly CatalogItemRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): CatalogItem
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
