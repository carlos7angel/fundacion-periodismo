<?php

namespace App\Containers\Monitoring\ViolationType\UI\WEB\Controllers;

use App\Containers\Monitoring\ViolationType\Actions\FindViolationTypeByIdAction;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\FindViolationTypeByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindViolationTypeByIdController extends WebController
{
    public function show(FindViolationTypeByIdRequest $request)
    {
        $violationType = app(FindViolationTypeByIdAction::class)->run($request);
        // ...
    }
}
