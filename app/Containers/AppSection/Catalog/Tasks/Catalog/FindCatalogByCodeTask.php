<?php

namespace App\Containers\AppSection\Catalog\Tasks\Catalog;

use App\Containers\AppSection\Catalog\Data\Repositories\CatalogRepository;
use App\Containers\AppSection\Catalog\Models\Catalog;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindCatalogByCodeTask extends ParentTask
{
    public function __construct(
        private readonly CatalogRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($code): Catalog
    {
        try {
            $result = $this->repository->findWhere([
                'code' => $code
            ])->first();
        } catch (\Exception) {
            throw new NotFoundException();
        }
        return $result;
    }
}
