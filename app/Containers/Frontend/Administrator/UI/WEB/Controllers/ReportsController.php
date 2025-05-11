<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Controllers;

use App\Containers\Frontend\Administrator\UI\WEB\Requests\Reports\GetReportDataByAggressorTypeRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Reports\GetReportDataByIndicatorRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Reports\GetReportDataByVictimTypeRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Reports\GetReportDataByViolationTypeRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Reports\ReportByIndicatorRequest;
use App\Containers\Monitoring\Denunciation\Actions\GetReportDataByAggressorTypeAction;
use App\Containers\Monitoring\Denunciation\Actions\GetReportDataByIndicatorAction;
use App\Containers\Monitoring\Denunciation\Actions\GetReportDataByVictimTypeAction;
use App\Containers\Monitoring\Denunciation\Actions\GetReportDataByViolationTypeAction;
use App\Ship\Parents\Controllers\WebController;

class ReportsController extends WebController
{
    public function index()
    {
        $page_title = "Reportes";
        return view('frontend@administrator::reports.index', [], compact('page_title'));
    }

    public function byAggressorType()
    {
        $page_title = "Reportes";
        return view('frontend@administrator::reports.byAggressorType', [], compact('page_title'));
    }

    public function byAggressorTypeJson(GetReportDataByAggressorTypeRequest $request)
    {
        try {
            $data = app(GetReportDataByAggressorTypeAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function byViolationType()
    {
        $page_title = "Reportes";
        return view('frontend@administrator::reports.byViolationType', [], compact('page_title'));
    }

    public function byViolationTypeJson(GetReportDataByViolationTypeRequest $request)
    {
        try {
            $data = app(GetReportDataByViolationTypeAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function byVictimType()
    {
        $page_title = "Reportes";
        return view('frontend@administrator::reports.byVictimType', [], compact('page_title'));
    }

    public function byVictimTypeJson(GetReportDataByVictimTypeRequest $request)
    {
        try {
            $data = app(GetReportDataByVictimTypeAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function byIndicator(ReportByIndicatorRequest $request)
    {
        $page_title = "Reporte por Indicador";
        return view('frontend@administrator::reports.byIndicator', ['indicator' => $request->id], compact('page_title'));
    }

    public function byIndicatorJson(GetReportDataByIndicatorRequest $request)
    {
        try {
            $data = app(GetReportDataByIndicatorAction::class)->run($request);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}

