<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Controllers;

use App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation\CreateDenunciationRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation\DetailDenunciationRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation\EditDenunciationRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation\GetDenunciationsJsonDataTableRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation\ListDenunciationsRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation\StoreDenunciationRequest;
use App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation\UpdateStatusDenunciationRequest;
use App\Containers\Monitoring\Denunciation\Actions\CreateDenunciationAction;
use App\Containers\Monitoring\Denunciation\Actions\GetDenunciationsJsonDataTableAction;
use App\Containers\Monitoring\Denunciation\Actions\UpdateDenunciationAction;
use App\Containers\Monitoring\Denunciation\Actions\UpdateStatusDenunciationAction;
use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Containers\Monitoring\Denunciation\Tasks\FindDenunciationByIdTask;
use App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\ListViolationTypeMapToArrayTask;
use App\Ship\Parents\Controllers\WebController;

class DenunciationController extends WebController
{
    public function list(ListDenunciationsRequest $request)
    {
        $page_title = "Denuncias";
        return view('frontend@administrator::denunciation.list', [], compact('page_title'));
    }

    public function listJsonDt(GetDenunciationsJsonDataTableRequest $request)
    {
        try {
            $data = app(GetDenunciationsJsonDataTableAction::class)->run($request);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function create(CreateDenunciationRequest $request)
    {
        $page_title = "Nueva Denuncia";
        $typification = app(ListViolationTypeMapToArrayTask::class)->run();

        return view('frontend@administrator::denunciation.form', [
            'denunciation' => new Denunciation(),
            'typification' => $typification
        ], compact('page_title'));
    }

    public function store(StoreDenunciationRequest $request)
    {
        // dd($request->all());
        try {
            if ($request->get('denunciation_id')) {
                $denunciation = app(UpdateDenunciationAction::class)->run($request);
            } else {
                $denunciation = app(CreateDenunciationAction::class)->run($request);
            }
            return response()->json([
                'success' => true,
                'redirect' => route('admin_denunciation_edit', ['id' => $denunciation->id])
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit(EditDenunciationRequest $request)
    {
        $page_title = "Editar Denuncia";
        $denunciation = app(FindDenunciationByIdTask::class)->run($request->id);
        $typification = app(ListViolationTypeMapToArrayTask::class)->run();

        return view('frontend@administrator::denunciation.form', [
            'denunciation' => $denunciation,
            'typification' => $typification
        ], compact('page_title'));
    }

    public function detail(DetailDenunciationRequest $request)
    {
        $page_title = "Detalle Denuncia";
        $denunciation = app(FindDenunciationByIdTask::class)->run($request->id);

        return view('frontend@administrator::denunciation.detail', [
            'denunciation' => $denunciation,
        ], compact('page_title'));
    }

    public function updateStatus(UpdateStatusDenunciationRequest $request)
    {
        try {
            $denunciation = app(UpdateStatusDenunciationAction::class)->run($request);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}

