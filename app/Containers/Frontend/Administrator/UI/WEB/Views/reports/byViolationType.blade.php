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
            <a class="text-white text-hover-secondary">Reportes</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Por tipo de agresión</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">
            REPORTE POR TIPO DE AGRESIÓN
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Reportes</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="row gy-5 gx-xl-10">
            <div class="d-flex justify-content-end mb-5">

                <div class="w-325px me-2">
                @php
                    $categories = app(\App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\ListViolationTypeCategoriesTask::class)->run();
                @endphp
                <select class="form-select form-select-solid kt_field_select_report" name="kt_field_category" data-placeholder="Todos los tipos" data-hide-search="true">
                    <option value=""></option>
                    @foreach($categories as $index => $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="" style="width: max-content">
                    <div class="input-group input-group-solid mb-5">
                        <input type="text" id="kt_field_daterangepicker" class="form-control form-control-solidg" />
                        <span class="input-group-text">
                            <i class="ki-outline ki-calendar-8 text-gray-500 lh-0 fs-2 ms-2 me-0"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-5 gx-xl-10">
            <div class="col-12 mb-5 mb-xl-10">
                <div class="card card-flush h-lg-100">
                    <div class="card-header pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-primary text-uppercase kt_report_by_violation_type_title"></span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Número y porcentaje de denuncias</span>
                        </h3>
                        <div class="card-toolbar">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Total:</span>
                                    <span class="fs-2hx fw-bold text-gray-900 ms-3 lh-1 ls-n2"
                                          id="kt_report_by_violation_type_total">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-10" id="kt_report_by_violation_type_card">
                        <div class="d-flex flex-stack">
                            <div class="text-gray-700 fw-bold fs-6 me-2">Cargando...</div>
                            <div class="d-flex align-items-center">
                                <div class="text-gray-900 fw-bolder fs-6">
                                    <span>0%</span> <span class="ps-2">(0)</span>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-5 gx-xl-10">
            <div class="col-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-primary">
                                GRÁFICO:
                                <span class="text-uppercase kt_report_by_violation_type_title"></span>
                            </span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Reporte gráfico en barras</span>
                        </h3>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body pt-6">
                        <div id="kt_report_by_violation_type_chart" class="card-rounded-bottom" style="height: 400px"
                             data-url="{{ route('admin_reports_by_violation_type_json') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-5 gx-xl-10">
            <div class="col-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Lista de denuncias seleccionadas</span>
                            <span class="text-muted mt-1 fw-semibold fs-7 kt_report_by_violation_type_title"></span>
                        </h3>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-bordered table-row-gray-300 align-middle gs-0 gy-3" id="kt_report_by_violation_type_table">
                                <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">#</th>
                                    <th class="min-w-100px">Documento#</th>
                                    <th class="min-w-140px">Agresor</th>
                                    <th class="min-w-140px">Víctima</th>
                                    <th class="min-w-150px">Tipo de Agresión</th>
                                    <th class="min-w-100px">Fecha</th>
                                    <th class="min-w-100px">Departamento</th>
                                    <th class="min-w-80px">Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/amchart5/index.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/Animated.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/xy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/percent.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/radar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/reports/by_violation_type.js') }}"></script>
@endsection