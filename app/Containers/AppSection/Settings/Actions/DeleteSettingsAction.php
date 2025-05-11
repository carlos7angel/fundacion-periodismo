<?php

namespace App\Containers\AppSection\Settings\Actions;

use App\Containers\AppSection\Settings\Tasks\DeleteSettingsTask;
use App\Containers\AppSection\Settings\UI\WEB\Requests\DeleteSettingsRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSettingsAction extends ParentAction
{
    public function __construct(
        private readonly DeleteSettingsTask $deleteSettingsTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSettingsRequest $request): int
    {
        return $this->deleteSettingsTask->run($request->id);
    }
}
