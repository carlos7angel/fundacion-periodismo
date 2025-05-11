<?php

namespace App\Containers\AppSection\Localization\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Localization\Models\State;
use App\Containers\AppSection\Localization\Tasks\UpdateLocalizationTask;
use App\Containers\AppSection\Localization\UI\WEB\Requests\UpdateLocalizationRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateLocalizationAction extends ParentAction
{
    public function __construct(
        private readonly UpdateLocalizationTask $updateLocalizationTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateLocalizationRequest $request): State
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateLocalizationTask->run($data, $request->id);
    }
}
