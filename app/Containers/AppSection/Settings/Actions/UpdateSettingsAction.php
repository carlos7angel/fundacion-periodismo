<?php

namespace App\Containers\AppSection\Settings\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Settings\Models\Settings;
use App\Containers\AppSection\Settings\Tasks\UpdateSettingsTask;
use App\Containers\AppSection\Settings\UI\WEB\Requests\UpdateSettingsRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSettingsAction extends ParentAction
{
    public function __construct(
        private readonly UpdateSettingsTask $updateSettingsTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSettingsRequest $request): Settings
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateSettingsTask->run($data, $request->id);
    }
}
