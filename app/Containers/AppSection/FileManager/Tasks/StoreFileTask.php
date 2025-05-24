<?php

namespace App\Containers\AppSection\FileManager\Tasks;

use App\Containers\AppSection\FileManager\Data\Repositories\FileRepository;
use App\Containers\AppSection\FileManager\Models\File;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class StoreFileTask extends ParentTask
{
    public function __construct(
        protected FileRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data): File
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
