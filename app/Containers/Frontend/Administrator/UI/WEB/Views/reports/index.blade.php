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
        <li class="breadcrumb-item text-white fw-bold lh-1">Inicio</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Reportes
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Listado de los Reportes</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="card">
            <div class="card-body p-5 px-lg-19 py-lg-16">
                <div class="mb-15">
                    <h1 class="fs-2x text-gray-900 mb-6">Reportes</h1>
                    <div class="fs-5 text-muted fw-semibold">
                        Seleccione el reporte para verificar los datos
                    </div>
                </div>
                <div class="row g-10 mb-18">

                    <div class="col-sm-6">
                        {{--<h3 class="fw-bold text-gray-900 mb-7"></h3>--}}
                        <div class="d-flex flex-column fw-semibold fs-4">
                            <a href="{{ route('admin_reports_by_violation_type') }}" class="link-primary mb-6">Por tipo de agresión o vulneración</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_AGGRESSOR_TYPE]) }}" class="link-primary mb-6">Por tipo de agresor</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_VICTIM_TYPE]) }}" class="link-primary mb-6">Por tipo de víctima</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_VICTIM_GENDER]) }}" class="link-primary mb-6">Por género de las víctimas</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_VICTIM_AGE_GROUP]) }}" class="link-primary mb-6">Por el grupo etario de las víctimas</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_DEPARTMENT]) }}" class="link-primary mb-6">Por departamento</a>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        {{--<h3 class="fw-bold text-gray-900 mb-7"></h3>--}}
                        <div class="d-flex flex-column fw-semibold fs-4">

                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_REPORT_STATUS]) }}" class="link-primary mb-6">Por estado de la denuncia</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_ACTION_RESPONSE_STATE]) }}" class="link-primary mb-6">Por acciones respuestas del estado</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_UNPROTECT_STATE]) }}" class="link-primary mb-6">Por acciones de desprotección del estado</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_ACTION_JOURNALISTIC_UNIONS]) }}" class="link-primary mb-6">Por respuesta de gremios periodisticos</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_ACTION_ORGANIZATION_SOCIETY]) }}" class="link-primary mb-6">Por respuesta de organizaciones sociales</a>
                            <a href="{{ route('admin_reports_by_indicator', ['id' => \App\Ship\Constants\IndicatorType::INDICATOR_SOURCE_INFORMATION]) }}" class="link-primary mb-6">Por fuente de información</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 bg-light text-center mb-4">
                    <div class="card-body py-12">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection