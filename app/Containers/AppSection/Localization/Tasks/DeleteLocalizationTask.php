<?php

namespace App\Containers\AppSection\Localization\Tasks;

use App\Containers\AppSection\Localization\Data\Repositories\StateRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteLocalizationTask extends ParentTask
{
    public function __construct(
        private readonly LocalizationRepository $repository,
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
