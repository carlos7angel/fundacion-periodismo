<?php

namespace App\Containers\AppSection\Localization\Tasks;

use App\Containers\AppSection\Localization\Data\Repositories\StateRepository;
use App\Containers\AppSection\Localization\Models\State;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateLocalizationTask extends ParentTask
{
    public function __construct(
        private readonly LocalizationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): State
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
