<?php

namespace App\Containers\AppSection\Localization\UI\WEB\Controllers;

use App\Containers\AppSection\Localization\Actions\DeleteLocalizationAction;
use App\Containers\AppSection\Localization\UI\WEB\Requests\DeleteLocalizationRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteLocalizationController extends WebController
{
    public function destroy(DeleteLocalizationRequest $request)
    {
        $result = app(DeleteLocalizationAction::class)->run($request);
        // ...
    }
}
