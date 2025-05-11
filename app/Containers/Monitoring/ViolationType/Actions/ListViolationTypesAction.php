<?php

namespace App\Containers\Monitoring\ViolationType\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\ViolationType\Tasks\ListViolationTypesTask;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\ListViolationTypesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListViolationTypesAction extends ParentAction
{
    public function __construct(
        private readonly ListViolationTypesTask $listViolationTypesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListViolationTypesRequest $request): mixed
    {
        return $this->listViolationTypesTask->run();
    }
}
