<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationType;

use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteViolationTypeTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}
