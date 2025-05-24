<?php

namespace App\Containers\Monitoring\Report\UI\WEB\Controllers;

use App\Containers\Monitoring\Report\Actions\DeleteReportAction;
use App\Containers\Monitoring\Report\UI\WEB\Requests\DeleteReportRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteReportController extends WebController
{
    public function destroy(DeleteReportRequest $request)
    {
        $result = app(DeleteReportAction::class)->run($request);
        // ...
    }
}
