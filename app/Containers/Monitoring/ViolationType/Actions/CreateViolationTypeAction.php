<?php

namespace App\Containers\Monitoring\ViolationType\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Containers\Monitoring\ViolationType\Tasks\CreateViolationTypeTask;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\CreateViolationTypeRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateViolationTypeAction extends ParentAction
{
    public function __construct(
        private readonly CreateViolationTypeTask $createViolationTypeTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateViolationTypeRequest $request): ViolationType
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createViolationTypeTask->run($data);
    }
}
