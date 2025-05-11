<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory;

use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeCategoryRepository;
use App\Containers\Monitoring\ViolationType\Models\ViolationTypeCategory;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateViolationTypeCategoryTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeCategoryRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ViolationTypeCategory
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
