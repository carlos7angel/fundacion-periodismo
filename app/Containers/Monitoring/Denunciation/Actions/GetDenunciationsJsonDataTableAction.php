<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Denunciation\Tasks\GetDenunciationsJsonDataTableTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetDenunciationsJsonDataTableAction extends ParentAction
{
    public function __construct(
        private GetDenunciationsJsonDataTableTask $task,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->task->run($request);
    }
}
