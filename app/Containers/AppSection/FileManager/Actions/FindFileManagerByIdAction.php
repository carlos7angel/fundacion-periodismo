<?php

namespace App\Containers\AppSection\FileManager\Actions;

use App\Containers\AppSection\FileManager\Models\File;
use App\Containers\AppSection\FileManager\Tasks\FindFileManagerByIdTask;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\FindFileManagerByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindFileManagerByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindFileManagerByIdTask $findFileManagerByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindFileManagerByIdRequest $request): File
    {
        return $this->findFileManagerByIdTask->run($request->id);
    }
}
