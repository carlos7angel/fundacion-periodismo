<?php

namespace App\Containers\Monitoring\ViolationType\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Containers\Monitoring\ViolationType\Tasks\UpdateViolationTypeTask;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\UpdateViolationTypeRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateViolationTypeAction extends ParentAction
{
    public function __construct(
        private readonly UpdateViolationTypeTask $updateViolationTypeTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateViolationTypeRequest $request): ViolationType
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateViolationTypeTask->run($data, $request->id);
    }
}
