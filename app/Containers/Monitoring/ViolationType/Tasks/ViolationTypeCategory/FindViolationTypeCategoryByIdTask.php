<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory;

use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeCategoryRepository;
use App\Containers\Monitoring\ViolationType\Models\ViolationTypeCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindViolationTypeCategoryByIdTask extends ParentTask
{
    public function __construct(
        private ViolationTypeCategoryRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ViolationTypeCategory
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
