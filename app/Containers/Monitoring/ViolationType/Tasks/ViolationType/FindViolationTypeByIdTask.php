<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationType;

use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeRepository;
use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindViolationTypeByIdTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ViolationType
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
