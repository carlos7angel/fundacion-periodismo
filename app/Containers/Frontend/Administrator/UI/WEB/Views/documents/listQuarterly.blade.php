@extends('vendor@template::admin.layouts.master', ['page' => ''])

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a href="" class="text-white text-hover-secondary">
                <i class="ki-outline ki-home text-white fs-3"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">
            <a class="text-white text-hover-secondary">Informes</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Trimestrales</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Informes Trimestrales
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Listado de documentos por gestión y trimestre</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="d-flex flex-wrap flex-stack pb-7">
            <div class="d-flex flex-wrap align-items-center my-1">
                <h3 class="fw-bold me-5 my-1">Todos los registros
                </h3>
            </div>
            <div class="d-flex flex-wrap my-1">
                <a href="{{ route('admin_document_create', ['type' => 'TRIMESTRAL']) }}" class="btn btn-primary"><i class="ki-outline ki-file-added fs-3 me-1"></i>Nuevo Informe</a>
            </div>
        </div>

        <div class="card card-flush">
            <div class="card-body">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_denunciations"
                       data-url="" aria-describedby="table">
                    <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-40px pe-2">#</th>
                        <th class="min-w-150px">Informe Año</th>
                        <th class="min-w-150px">Trimestre</th>
                        <th class="min-w-150px">Documento</th>
                        <th class="text-center min-w-150px">Estado</th>
                        <th class="text-center min-w-100px">Registro</th>
                        <th class="text-end min-w-70px">Opciones</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @if(count($reports)>0)
                            @foreach($reports as $index => $report)
                            <tr>
                                <td>
                                    <span>{{ $index+1 }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-primary">
                                                <i class="ki-outline ki-scroll fs-2x text-info"></i>
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-gray-900 fw-bolder text-hover-primary fs-5">{{ $report->year }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span>{{ $report->quarter }}</span>
                                </td>
                                <td>
                                    <span class="text-gray-900 fw-bold text-hover-primary mb-1 fs-7">{{ $report->fileReport->origin_name }}</span>
                                    <span class="text-muted fw-semibold d-block fs-7">{{ convertBytes($report->fileReport->size) }}</span>
                                </td>
                                <td class="text-center">
                                    @if($report->active)
                                        <span class="badge badge-light-success">Activo</span>
                                    @else
                                        <span class="badge badge-light-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="text-muted fw-bold">{{ $report->created_at }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <a href="{{ route('admin_document_edit', ['id' => $report->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="ki-outline ki-pencil fs-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/document/list_yearly.js') }}"></script>
@endsection