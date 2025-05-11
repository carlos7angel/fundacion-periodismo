<?php

namespace App\Containers\AppSection\FileManager\Actions;

use App\Containers\AppSection\FileManager\Tasks\DeleteFileManagerTask;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\DeleteFileManagerRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteFileManagerAction extends ParentAction
{
    public function __construct(
        private readonly DeleteFileManagerTask $deleteFileManagerTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFileManagerRequest $request): int
    {
        return $this->deleteFileManagerTask->run($request->id);
    }
}
