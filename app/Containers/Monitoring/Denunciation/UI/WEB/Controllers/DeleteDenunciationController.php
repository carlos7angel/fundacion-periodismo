<?php

namespace App\Containers\Monitoring\Denunciation\UI\WEB\Controllers;

use App\Containers\Monitoring\Denunciation\Actions\DeleteDenunciationAction;
use App\Containers\Monitoring\Denunciation\UI\WEB\Requests\DeleteDenunciationRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteDenunciationController extends WebController
{
    public function destroy(DeleteDenunciationRequest $request)
    {
        $result = app(DeleteDenunciationAction::class)->run($request);
        // ...
    }
}
