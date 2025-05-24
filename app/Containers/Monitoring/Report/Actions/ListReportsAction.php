<?php

namespace App\Containers\Monitoring\Report\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Report\Tasks\ListReportsTask;
use App\Containers\Monitoring\Report\UI\WEB\Requests\ListReportsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListReportsAction extends ParentAction
{
    public function __construct(
        private readonly ListReportsTask $listReportsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListReportsRequest $request): mixed
    {
        return $this->listReportsTask->run();
    }
}
