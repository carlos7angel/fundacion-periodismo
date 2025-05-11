<?php

namespace App\Containers\AppSection\Settings\UI\WEB\Controllers;

use App\Containers\AppSection\Settings\Actions\DeleteSettingsAction;
use App\Containers\AppSection\Settings\UI\WEB\Requests\DeleteSettingsRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteSettingsController extends WebController
{
    public function destroy(DeleteSettingsRequest $request)
    {
        $result = app(DeleteSettingsAction::class)->run($request);
        // ...
    }
}
