<?php

namespace App\Containers\AppSection\Settings\UI\WEB\Controllers;

use App\Containers\AppSection\Settings\Actions\FindSettingsByIdAction;
use App\Containers\AppSection\Settings\UI\WEB\Requests\FindSettingsByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindSettingsByIdController extends WebController
{
    public function show(FindSettingsByIdRequest $request)
    {
        $settings = app(FindSettingsByIdAction::class)->run($request);
        // ...
    }
}
