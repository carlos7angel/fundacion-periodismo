<?php

namespace App\Containers\AppSection\Settings\UI\WEB\Controllers;

use App\Containers\AppSection\Settings\Actions\FindSettingsByIdAction;
use App\Containers\AppSection\Settings\Actions\UpdateSettingsAction;
use App\Containers\AppSection\Settings\UI\WEB\Requests\EditSettingsRequest;
use App\Containers\AppSection\Settings\UI\WEB\Requests\UpdateSettingsRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateSettingsController extends WebController
{
    public function edit(EditSettingsRequest $request)
    {
        $settings = app(FindSettingsByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateSettingsRequest $request)
    {
        $settings = app(UpdateSettingsAction::class)->run($request);
        // ...
    }
}
