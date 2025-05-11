<?php

namespace App\Containers\Monitoring\ViolationType\Actions;

use App\Containers\Monitoring\ViolationType\Tasks\DeleteViolationTypeTask;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\DeleteViolationTypeRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteViolationTypeAction extends ParentAction
{
    public function __construct(
        private readonly DeleteViolationTypeTask $deleteViolationTypeTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteViolationTypeRequest $request): int
    {
        return $this->deleteViolationTypeTask->run($request->id);
    }
}
