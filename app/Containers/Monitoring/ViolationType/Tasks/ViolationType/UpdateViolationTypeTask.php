<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationType;

use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeRepository;
use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateViolationTypeTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ViolationType
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
