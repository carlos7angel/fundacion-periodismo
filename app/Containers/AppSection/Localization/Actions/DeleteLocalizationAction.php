<?php

namespace App\Containers\AppSection\Localization\Actions;

use App\Containers\AppSection\Localization\Tasks\DeleteLocalizationTask;
use App\Containers\AppSection\Localization\UI\WEB\Requests\DeleteLocalizationRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteLocalizationAction extends ParentAction
{
    public function __construct(
        private readonly DeleteLocalizationTask $deleteLocalizationTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteLocalizationRequest $request): int
    {
        return $this->deleteLocalizationTask->run($request->id);
    }
}
