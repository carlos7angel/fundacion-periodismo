<?php

namespace App\Containers\AppSection\FileManager\Tasks;

use App\Containers\AppSection\FileManager\Data\Repositories\FileRepository;
use App\Containers\AppSection\FileManager\Models\File;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFileManagerByIdTask extends ParentTask
{
    public function __construct(
        private readonly FileManagerRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): File
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
