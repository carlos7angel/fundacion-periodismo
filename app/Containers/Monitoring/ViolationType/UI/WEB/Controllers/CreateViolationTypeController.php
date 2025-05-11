<?php

namespace App\Containers\Monitoring\ViolationType\UI\WEB\Controllers;

use App\Containers\Monitoring\ViolationType\Actions\CreateViolationTypeAction;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\CreateViolationTypeRequest;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\StoreViolationTypeRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateViolationTypeController extends WebController
{
    public function create(CreateViolationTypeRequest $request)
    {
    }

    public function store(StoreViolationTypeRequest $request)
    {
        $violationType = app(CreateViolationTypeAction::class)->run($request);
        // ...
    }
}
