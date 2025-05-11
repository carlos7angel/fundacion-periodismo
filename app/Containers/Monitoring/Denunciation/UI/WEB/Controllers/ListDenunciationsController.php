<?php

namespace App\Containers\Monitoring\Denunciation\UI\WEB\Controllers;

use App\Containers\Monitoring\Denunciation\Actions\ListDenunciationsAction;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\ListDenunciationsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListDenunciationsController extends WebController
{
    public function index(ListDenunciationsRequest $request)
    {
        $denunciations = app(ListDenunciationsAction::class)->run($request);
        // ...
    }
}
