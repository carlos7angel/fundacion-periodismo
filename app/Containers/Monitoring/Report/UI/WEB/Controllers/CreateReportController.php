<?php

namespace App\Containers\Monitoring\Report\UI\WEB\Controllers;

use App\Containers\Monitoring\Report\Actions\CreateReportAction;
use App\Containers\Monitoring\Report\UI\WEB\Requests\CreateReportRequest;
use App\Containers\Monitoring\Report\UI\WEB\Requests\StoreReportRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateReportController extends WebController
{
    public function create(CreateReportRequest $request)
    {
    }

    public function store(StoreReportRequest $request)
    {
        $report = app(CreateReportAction::class)->run($request);
        // ...
    }
}
