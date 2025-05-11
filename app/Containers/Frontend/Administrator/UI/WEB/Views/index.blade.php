@extends('vendor@template::admin.layouts.master', ['page' => 'index'])

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
            <a class="text-white text-hover-secondary">Inicio</a>
        </li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">
            INICIO
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Dashboard</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content">

            <div class="row gy-5 gx-xl-10">
                <div class="overflow-auto pb-0 mb-5">
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                        <i class="ki-duotone ki-graph-up fs-3tx text-primary me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                        </i>
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <div class="mb-3 mb-md-0 fw-semibold">
                                <h4 class="text-gray-900 fw-bold">¡Bienvenido al Sistema de Monitoreo sobre Protección de Periodistas!</h4>
                                <h5 class="text-muted fw-bold">Tu plataforma centralizada para la gestión de registros de casos de agresión y/o vulneración.</h5>
                                <div class="fs-6 text-gray-600 pe-7">
                                    Nos complace darte la bienvenida a este sistema, diseñado específicamente para facilitar la administración, organización y seguimiento
                                    de los registros de incidentes. <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-5 gx-xl-10">
                <div class="col-sm-4 mb-5">
                    <div class="card h-100">
                        <div class="card-header flex-nowrap border-0 pt-5">
                            <div class="card-title m-0">
                                <i class="ki-duotone ki-chart-line fs-3hx text-gray-400">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="card-toolbar m-0">
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column px-9 pt-3 pb-5">
                            <div class="fs-2tx fw-bold mb-3" id="kt_card_total_denunciations_all">0</div>
                            <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                                <i class="ki-duotone ki-Up-right fs-3 me-1 text-danger"></i>
                                <div class="fw-semibold text-gray-500">Total Casos</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-5">
                    <div class="card h-100">
                        <div class="card-header flex-nowrap border-0 pt-5">
                            <div class="card-title m-0">
                                <i class="ki-duotone ki-chart-line fs-3hx text-gray-400">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="card-toolbar m-0">
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column px-9 pt-3 pb-5">
                            <div class="fs-2tx fw-bold mb-3" id="kt_card_total_denunciations_in_progress">0</div>
                            <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                                <i class="ki-duotone ki-Up-right fs-3 me-1 text-danger"></i>
                                <div class="fw-semibold text-gray-500">Casos En Progreso</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-5">
                    <div class="card h-100">
                        <div class="card-header flex-nowrap border-0 pt-5">
                            <div class="card-title m-0">
                                <i class="ki-duotone ki-chart-line fs-3hx text-gray-400">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="card-toolbar m-0">
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column px-9 pt-3 pb-5">
                            <div class="fs-2tx fw-bold mb-3" id="kt_card_total_denunciations_closed">0</div>
                            <div class="d-flex align-items-center flex-wrap mb-5 mt-auto fs-6">
                                <i class="ki-duotone ki-Up-right fs-3 me-1 text-danger"></i>
                                <div class="fw-semibold text-gray-500">Casos Cerradas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-5 gx-xl-10">
                <div class="col-12 mb-5 mb-xl-10">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-900">Registro de Casos de agresión/vulneración</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Reporte en los últimos 30 dias</span>
                            </h3>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body pt-6">
                            <div id="kt_report_by_created_date_chart" class="card-rounded-bottom" style="height: 350px"
                                 data-url="{{ route('admin_reports_by_dashboard_json') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/amchart5/index.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/Animated.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/xy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/percent.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/common/plugins/custom/amchart5/radar.js') }}" type="text/javascript"></script>

    <script src="{{ asset('themes/admin/js/custom/dashboard/index.js') }}"></script>
@endsection