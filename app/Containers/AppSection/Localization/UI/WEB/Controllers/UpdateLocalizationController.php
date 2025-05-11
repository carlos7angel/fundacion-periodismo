<?php

namespace App\Containers\AppSection\Localization\UI\WEB\Controllers;

use App\Containers\AppSection\Localization\Actions\FindLocalizationByIdAction;
use App\Containers\AppSection\Localization\Actions\UpdateLocalizationAction;
use App\Containers\AppSection\Localization\UI\WEB\Requests\EditLocalizationRequest;
use App\Containers\AppSection\Localization\UI\WEB\Requests\UpdateLocalizationRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateLocalizationController extends WebController
{
    public function edit(EditLocalizationRequest $request)
    {
        $localization = app(FindLocalizationByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateLocalizationRequest $request)
    {
        $localization = app(UpdateLocalizationAction::class)->run($request);
        // ...
    }
}
