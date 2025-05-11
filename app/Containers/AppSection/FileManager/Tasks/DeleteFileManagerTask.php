<?php

namespace App\Containers\AppSection\FileManager\Tasks;

use App\Containers\AppSection\FileManager\Data\Repositories\FileRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteFileManagerTask extends ParentTask
{
    public function __construct(
        private readonly FileManagerRepository $repository,
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
