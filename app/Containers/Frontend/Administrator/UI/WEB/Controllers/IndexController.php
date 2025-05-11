<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Controllers;

use App\Containers\Frontend\Administrator\UI\WEB\Requests\Reports\GetReportDataRecordsByDateRequest;
use App\Containers\Monitoring\Denunciation\Actions\GetReportDataRecordsByDateAction;
use App\Ship\Parents\Controllers\WebController;

class IndexController extends WebController
{
    public function showIndexPage()
    {
        $page_title = "Inicio";
        return view('frontend@administrator::index', [], compact('page_title'));
    }

    public function dashboardJson(GetReportDataRecordsByDateRequest $request)
    {
        try {
            $data = app(GetReportDataRecordsByDateAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}

