<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateDenunciationTask extends ParentTask
{
    public function __construct(
        private readonly DenunciationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Denunciation
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
