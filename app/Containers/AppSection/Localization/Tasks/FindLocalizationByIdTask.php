<?php

namespace App\Containers\AppSection\Localization\Tasks;

use App\Containers\AppSection\Localization\Data\Repositories\StateRepository;
use App\Containers\AppSection\Localization\Models\State;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindLocalizationByIdTask extends ParentTask
{
    public function __construct(
        private readonly LocalizationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): State
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
