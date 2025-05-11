<?php

namespace App\Containers\Monitoring\ViolationType\UI\WEB\Controllers;

use App\Containers\Monitoring\ViolationType\Actions\ListViolationTypesAction;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\ListViolationTypesRequest;
use App\Ship\Parents\Controllers\WebController;

class ListViolationTypesController extends WebController
{
    public function index(ListViolationTypesRequest $request)
    {
        $violationTypes = app(ListViolationTypesAction::class)->run($request);
        // ...
    }
}
