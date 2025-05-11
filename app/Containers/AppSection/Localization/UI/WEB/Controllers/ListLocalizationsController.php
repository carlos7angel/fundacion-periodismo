<?php

namespace App\Containers\AppSection\Localization\UI\WEB\Controllers;

use App\Containers\AppSection\Localization\Actions\ListLocalizationsAction;
use App\Containers\AppSection\Localization\UI\WEB\Requests\ListLocalizationsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListLocalizationsController extends WebController
{
    public function index(ListLocalizationsRequest $request)
    {
        $localizations = app(ListLocalizationsAction::class)->run($request);
        // ...
    }
}
