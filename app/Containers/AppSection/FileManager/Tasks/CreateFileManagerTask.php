<?php

namespace App\Containers\AppSection\FileManager\Tasks;

use App\Containers\AppSection\FileManager\Data\Repositories\FileRepository;
use App\Containers\AppSection\FileManager\Models\File;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateFileManagerTask extends ParentTask
{
    public function __construct(
        private readonly FileManagerRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): File
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
