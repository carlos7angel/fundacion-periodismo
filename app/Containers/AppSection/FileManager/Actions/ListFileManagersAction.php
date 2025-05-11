<?php

namespace App\Containers\AppSection\FileManager\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\FileManager\Tasks\ListFileManagersTask;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\ListFileManagersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFileManagersAction extends ParentAction
{
    public function __construct(
        private readonly ListFileManagersTask $listFileManagersTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListFileManagersRequest $request): mixed
    {
        return $this->listFileManagersTask->run();
    }
}
