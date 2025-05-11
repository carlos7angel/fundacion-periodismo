<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationStatusActivityRepository;
use App\Containers\Monitoring\Denunciation\Models\DenunciationStatusActivity;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateDenunciationStatusActivityTask extends ParentTask
{
    public function __construct(
        private DenunciationStatusActivityRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): DenunciationStatusActivity
    {
//        try {
            return $this->repository->create($data);
//        } catch (\Exception) {
//            throw new CreateResourceFailedException();
//        }
    }
}
