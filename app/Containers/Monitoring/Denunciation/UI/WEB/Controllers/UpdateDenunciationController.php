<?php

namespace App\Containers\Monitoring\Denunciation\UI\WEB\Controllers;

use App\Containers\Monitoring\Denunciation\Actions\FindDenunciationByIdAction;
use App\Containers\Monitoring\Denunciation\Actions\UpdateDenunciationAction;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\EditDenunciationRequest;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\UpdateDenunciationRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateDenunciationController extends WebController
{
    public function edit(EditDenunciationRequest $request)
    {
        $denunciation = app(FindDenunciationByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateDenunciationRequest $request)
    {
        $denunciation = app(UpdateDenunciationAction::class)->run($request);
        // ...
    }
}
