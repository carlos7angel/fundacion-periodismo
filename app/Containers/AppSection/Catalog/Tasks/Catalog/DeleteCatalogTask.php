<?php

namespace App\Containers\AppSection\Catalog\Tasks\Catalog;

use App\Containers\AppSection\Catalog\Data\Repositories\CatalogRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteCatalogTask extends ParentTask
{
    public function __construct(
        private readonly CatalogRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}
