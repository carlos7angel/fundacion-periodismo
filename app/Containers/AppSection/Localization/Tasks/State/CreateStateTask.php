<?php

namespace App\Containers\AppSection\Localization\Tasks\State;

use App\Containers\AppSection\Localization\Data\Repositories\StateRepository;
use App\Containers\AppSection\Localization\Models\State;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateStateTask extends ParentTask
{
    public function __construct(
        private readonly StateRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): State
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
