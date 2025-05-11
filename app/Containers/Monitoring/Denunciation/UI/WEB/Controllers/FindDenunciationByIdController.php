<?php

namespace App\Containers\Monitoring\Denunciation\UI\WEB\Controllers;

use App\Containers\Monitoring\Denunciation\Actions\FindDenunciationByIdAction;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\FindDenunciationByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindDenunciationByIdController extends WebController
{
    public function show(FindDenunciationByIdRequest $request)
    {
        $denunciation = app(FindDenunciationByIdAction::class)->run($request);
        // ...
    }
}
