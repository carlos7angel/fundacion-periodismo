<?php

namespace App\Containers\AppSection\Catalog\Tasks\Catalog;

use App\Containers\AppSection\Catalog\Data\Repositories\CatalogRepository;
use App\Containers\AppSection\Catalog\Models\Catalog;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateCatalogTask extends ParentTask
{
    public function __construct(
        private readonly CatalogRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Catalog
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
