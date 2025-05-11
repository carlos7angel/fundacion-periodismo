<?php

namespace App\Containers\AppSection\Localization\UI\WEB\Controllers;

use App\Containers\AppSection\Localization\Actions\FindLocalizationByIdAction;
use App\Containers\AppSection\Localization\UI\WEB\Requests\FindLocalizationByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindLocalizationByIdController extends WebController
{
    public function show(FindLocalizationByIdRequest $request)
    {
        $localization = app(FindLocalizationByIdAction::class)->run($request);
        // ...
    }
}
