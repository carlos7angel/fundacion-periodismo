<?php

namespace App\Containers\AppSection\Catalog\Tasks\Catalog;

use App\Containers\AppSection\Catalog\Data\Repositories\CatalogRepository;
use App\Containers\AppSection\Catalog\Models\Catalog;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateCatalogTask extends ParentTask
{
    public function __construct(
        private readonly CatalogRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Catalog
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
