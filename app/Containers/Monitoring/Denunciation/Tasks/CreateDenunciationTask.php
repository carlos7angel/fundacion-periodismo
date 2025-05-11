<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateDenunciationTask extends ParentTask
{
    public function __construct(
        private readonly DenunciationRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Denunciation
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
