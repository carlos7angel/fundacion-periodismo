<?php

namespace App\Containers\Monitoring\ViolationType\Actions;

use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Containers\Monitoring\ViolationType\Tasks\FindViolationTypeByIdTask;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\FindViolationTypeByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindViolationTypeByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindViolationTypeByIdTask $findViolationTypeByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindViolationTypeByIdRequest $request): ViolationType
    {
        return $this->findViolationTypeByIdTask->run($request->id);
    }
}
