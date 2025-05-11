<?php

namespace App\Containers\Monitoring\ViolationType\UI\WEB\Controllers;

use App\Containers\Monitoring\ViolationType\Actions\FindViolationTypeByIdAction;
use App\Containers\Monitoring\ViolationType\Actions\UpdateViolationTypeAction;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\EditViolationTypeRequest;
use App\Containers\Monitoring\ViolationType\UI\WEB\Requests\UpdateViolationTypeRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateViolationTypeController extends WebController
{
    public function edit(EditViolationTypeRequest $request)
    {
        $violationType = app(FindViolationTypeByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateViolationTypeRequest $request)
    {
        $violationType = app(UpdateViolationTypeAction::class)->run($request);
        // ...
    }
}
