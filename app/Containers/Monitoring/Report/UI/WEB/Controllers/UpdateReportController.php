<?php

namespace App\Containers\Monitoring\Report\UI\WEB\Controllers;

use App\Containers\Monitoring\Report\Actions\FindReportByIdAction;
use App\Containers\Monitoring\Report\Actions\UpdateReportAction;
use App\Containers\Monitoring\Report\UI\WEB\Requests\EditReportRequest;
use App\Containers\Monitoring\Report\UI\WEB\Requests\UpdateReportRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateReportController extends WebController
{
    public function edit(EditReportRequest $request)
    {
        $report = app(FindReportByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateReportRequest $request)
    {
        $report = app(UpdateReportAction::class)->run($request);
        // ...
    }
}
