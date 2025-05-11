<?php

namespace App\Containers\Monitoring\Denunciation\UI\WEB\Controllers;

use App\Containers\Monitoring\Denunciation\Actions\CreateDenunciationAction;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\CreateDenunciationRequest;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\StoreDenunciationRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateDenunciationController extends WebController
{
    public function create(CreateDenunciationRequest $request)
    {
    }

    public function store(StoreDenunciationRequest $request)
    {
        $denunciation = app(CreateDenunciationAction::class)->run($request);
        // ...
    }
}
