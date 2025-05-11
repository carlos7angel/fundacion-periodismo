<?php

namespace App\Containers\AppSection\Settings\UI\WEB\Controllers;

use App\Containers\AppSection\Settings\Actions\ListSettingsAction;
use App\Containers\AppSection\Settings\UI\WEB\Requests\ListSettingsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListSettingsController extends WebController
{
    public function index(ListSettingsRequest $request)
    {
        $settings = app(ListSettingsAction::class)->run($request);
        // ...
    }
}
