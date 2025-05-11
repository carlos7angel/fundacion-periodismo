<?php

namespace App\Containers\AppSection\Settings\UI\WEB\Controllers;

use App\Containers\AppSection\Settings\Actions\CreateSettingsAction;
use App\Containers\AppSection\Settings\UI\WEB\Requests\CreateSettingsRequest;
use App\Containers\AppSection\Settings\UI\WEB\Requests\StoreSettingsRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateSettingsController extends WebController
{
    public function create(CreateSettingsRequest $request)
    {
    }

    public function store(StoreSettingsRequest $request)
    {
        $settings = app(CreateSettingsAction::class)->run($request);
        // ...
    }
}
