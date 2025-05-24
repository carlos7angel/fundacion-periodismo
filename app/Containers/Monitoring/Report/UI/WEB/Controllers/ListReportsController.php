<?php

namespace App\Containers\Monitoring\Report\UI\WEB\Controllers;

use App\Containers\Monitoring\Report\Actions\ListReportsAction;
use App\Containers\Monitoring\Report\UI\WEB\Requests\ListReportsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListReportsController extends WebController
{
    public function index(ListReportsRequest $request)
    {
        $reports = app(ListReportsAction::class)->run($request);
        // ...
    }
}
