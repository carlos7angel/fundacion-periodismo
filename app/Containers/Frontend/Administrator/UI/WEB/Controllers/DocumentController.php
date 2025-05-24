<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Controllers;

use App\Containers\Frontend\Administrator\UI\WEB\Requests\Document\CreateDocumentRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Document\EditDocumentRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Document\StoreDocumentRequest;
use App\Containers\Monitoring\Report\Actions\CreateReportAction;
use App\Containers\Monitoring\Report\Actions\UpdateReportAction;
use App\Containers\Monitoring\Report\Models\Report;
use App\Containers\Monitoring\Report\Tasks\FindReportByIdTask;
use App\Containers\Monitoring\Report\Tasks\ListReportsByTypeTask;
use App\Ship\Parents\Controllers\WebController;

class DocumentController extends WebController
{
    public function listYearly()
    {
        $page_title = "Informes anuales";
        $reports = app(ListReportsByTypeTask::class)->run('ANUAL');
        return view('frontend@administrator::documents.listYearly', ['reports' => $reports], compact('page_title'));
    }

    public function listQuarterly()
    {
        $page_title = "Informes trimestrales";
        $reports = app(ListReportsByTypeTask::class)->run('TRIMESTRAL');
        return view('frontend@administrator::documents.listQuarterly', ['reports' => $reports], compact('page_title'));
    }

    public function create(CreateDocumentRequest $request)
    {
        if ($request->type === 'ANUAL' || $request->type === 'TRIMESTRAL') {
            $page_title = "Nuevo Informe";
            return view('frontend@administrator::documents.form', [
                'document' => new Report(),
                'type' => $request->type,
                'action' => 'Nuevo'
            ], compact('page_title'));
        } else {
            return redirect()->route('admin_document_list_yearly');
        }
    }

    public function store(StoreDocumentRequest $request)
    {
        try {
            if ($request->get('document_id')) {
                $document = app(UpdateReportAction::class)->run($request);
            } else {
                $document = app(CreateReportAction::class)->run($request);
            }
            return response()->json([
                'success' => true,
                'redirect' => route('admin_document_edit', ['id' => $document->id])
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit(EditDocumentRequest $request)
    {
        $page_title = "Editar Informe";
        $report = app(FindReportByIdTask::class)->run($request->id);
        return view('frontend@administrator::documents.form', [
            'document' => $report,
            'type' => $report->type,
            'action' => 'Editar'
        ], compact('page_title'));
    }
}

