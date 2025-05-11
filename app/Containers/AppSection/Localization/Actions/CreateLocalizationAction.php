<?php

namespace App\Containers\AppSection\Localization\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Localization\Models\State;
use App\Containers\AppSection\Localization\Tasks\CreateLocalizationTask;
use App\Containers\AppSection\Localization\UI\WEB\Requests\CreateLocalizationRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateLocalizationAction extends ParentAction
{
    public function __construct(
        private readonly CreateLocalizationTask $createLocalizationTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateLocalizationRequest $request): State
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createLocalizationTask->run($data);
    }
}
