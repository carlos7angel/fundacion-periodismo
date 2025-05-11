<?php

namespace App\Containers\AppSection\Localization\UI\WEB\Controllers;

use App\Containers\AppSection\Localization\Actions\CreateLocalizationAction;
use App\Containers\AppSection\Localization\UI\WEB\Requests\CreateLocalizationRequest;
use App\Containers\AppSection\Localization\UI\WEB\Requests\StoreLocalizationRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateLocalizationController extends WebController
{
    public function create(CreateLocalizationRequest $request)
    {
    }

    public function store(StoreLocalizationRequest $request)
    {
        $localization = app(CreateLocalizationAction::class)->run($request);
        // ...
    }
}
