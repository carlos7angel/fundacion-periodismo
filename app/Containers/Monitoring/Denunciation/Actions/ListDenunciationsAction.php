<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Denunciation\Tasks\ListDenunciationsTask;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\ListDenunciationsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListDenunciationsAction extends ParentAction
{
    public function __construct(
        private readonly ListDenunciationsTask $listDenunciationsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListDenunciationsRequest $request): mixed
    {
        return $this->listDenunciationsTask->run();
    }
}
