<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationType;

use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeRepository;
use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateViolationTypeTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ViolationType
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
