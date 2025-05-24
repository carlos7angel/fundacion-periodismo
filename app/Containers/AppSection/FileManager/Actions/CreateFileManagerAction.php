<?php

namespace App\Containers\AppSection\FileManager\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\FileManager\Models\File;
use App\Containers\AppSection\FileManager\Tasks\CreateFileTask;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\CreateFileManagerRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateFileManagerAction extends ParentAction
{
    public function __construct(
        private readonly CreateFileManagerTask $createFileManagerTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFileManagerRequest $request): File
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createFileManagerTask->run($data);
    }
}
