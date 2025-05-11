<?php

namespace App\Containers\AppSection\Localization\Actions;

use App\Containers\AppSection\Localization\Models\State;
use App\Containers\AppSection\Localization\Tasks\FindLocalizationByIdTask;
use App\Containers\AppSection\Localization\UI\WEB\Requests\FindLocalizationByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindLocalizationByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindLocalizationByIdTask $findLocalizationByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindLocalizationByIdRequest $request): State
    {
        return $this->findLocalizationByIdTask->run($request->id);
    }
}
