<?php

namespace App\Containers\Monitoring\ViolationType\UI\WEB\Controllers;

use App\Containers\Monitoring\ViolationType\Actions\DeleteViolationTypeAction;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\DeleteViolationTypeRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteViolationTypeController extends WebController
{
    public function destroy(DeleteViolationTypeRequest $request)
    {
        $result = app(DeleteViolationTypeAction::class)->run($request);
        // ...
    }
}
