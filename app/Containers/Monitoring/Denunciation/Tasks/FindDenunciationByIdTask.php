<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindDenunciationByIdTask extends ParentTask
{
    public function __construct(
        private readonly DenunciationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Denunciation
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
