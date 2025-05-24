<?php

namespace App\Containers\Monitoring\Report\UI\WEB\Controllers;

use App\Containers\Monitoring\Report\Actions\FindReportByIdAction;
use App\Containers\Monitoring\Report\UI\WEB\Requests\FindReportByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindReportByIdController extends WebController
{
    public function show(FindReportByIdRequest $request)
    {
        $report = app(FindReportByIdAction::class)->run($request);
        // ...
    }
}
