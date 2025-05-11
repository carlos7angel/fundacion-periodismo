<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use App\Containers\Monitoring\Denunciation\Tasks\DeleteDenunciationTask;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\DeleteDenunciationRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteDenunciationAction extends ParentAction
{
    public function __construct(
        private readonly DeleteDenunciationTask $deleteDenunciationTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteDenunciationRequest $request): int
    {
        return $this->deleteDenunciationTask->run($request->id);
    }
}
