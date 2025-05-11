<?php

namespace App\Containers\AppSection\Settings\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Settings\Models\Settings;
use App\Containers\AppSection\Settings\Tasks\CreateSettingsTask;
use App\Containers\AppSection\Settings\UI\WEB\Requests\CreateSettingsRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSettingsAction extends ParentAction
{
    public function __construct(
        private readonly CreateSettingsTask $createSettingsTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSettingsRequest $request): Settings
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createSettingsTask->run($data);
    }
}
