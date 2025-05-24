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
            <a class="text-white text-hover-secondary">Casos</a>
        </li>
        <li class="breadcrumb-item">
            <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
        </li>
        <li class="breadcrumb-item text-white fw-bold lh-1">Nuevo</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Nuevo Registro
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Casos de agresión/vulneración</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="row g-7">
            <div class="offset-1 col-xl-10">

                <div class="py-10">

                    <div class="mb-13 text-center">
                        <h1 class="fs-2hx fw-bold mb-5">Formulario</h1>
                        <div class="text-gray-600 fw-semibold fs-5">Protección de Periodistas en Bolivia</div>
                    </div>

                    <div class="separator separator-dashed mb-9"></div>

                    <!--begin::Form-->
                    <form id="kt_denunciation_form" class="form" action="{{ route('admin_denunciation_store') }}" method="post" autocomplete="off">

                        <input type="hidden" name="denunciation_id" value="{{ $denunciation->id }}">

                        <div class="card card-flush h-lg-100 card-borderless shadow-none">

                            <div class="card-header pt-0">
                                <div class="card-title">
                                    <i class="ki-outline ki-badge fs-1 me-2"></i>
                                    <h2>Identificación del Perpetrador/Agresor</h2>
                                </div>
                            </div>

                            <div class="card-body pt-5">

                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tipo de perpetrador o agresor:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('AGR');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_aggressor_type_select" name="aggressor_type">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->aggressor_type == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <div id="kt_box_aggressor_subtype">
                                                <div class="w-100">
                                                    @php
                                                        $catalog_items = app(\App\Containers\AppSection\Catalog\Tasks\CatalogItem\ListCatalogItemsByParentCodeTask::class)->run('AGR01');
                                                    @endphp
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Tipo de actor estatal:</span>
                                                    </label>
                                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                            id="kt_aggressor_subtype_select" name="aggressor_subtype">
                                                        <option></option>
                                                        @foreach($catalog_items as $index => $option)
                                                            <option value="{{ $option->name }}" {{ $denunciation->aggressor_subtype == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="form-label mb-1">Identificación del perpetrador o agresor:</label>
                                    <div class="form-check form-check-custom mb-3">
                                        <input class="form-check-input h-25px w-25px aggressor_identified_checkbox" type="checkbox" name="aggressor_identified" value="{{ $denunciation->aggressor_identified }}" data-label="Sin información/anónimo" {{ $denunciation->aggressor_identified ? '' : 'checked="checked"' }} />
                                        <label class="form-check-label fw-semibold">Sin información/anónimo</label>
                                    </div>
                                    {{--<div class="text-muted fs-7 mb-5">Lorem ipsum dolor sit amet conqueror.</div>--}}
                                </div>

                                <div id="kt_box_aggressor_identified">
                                    <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                                        <div class="col">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Nombre:</span>
                                                </label>
                                                <input type="text" class="form-control" name="aggressor_name" value="{{ $denunciation->aggressor_name }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Institución:</span>
                                                </label>
                                                <input type="text" class="form-control" name="aggressor_organization" value="{{ $denunciation->aggressor_organization }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Cargo:</span>
                                                </label>
                                                <input type="text" class="form-control" name="aggressor_job_title" value="{{ $denunciation->aggressor_job_title }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush h-lg-100 card-borderless shadow-none">

                            <div class="card-header pt-0">
                                <div class="card-title">
                                    <i class="ki-outline ki-badge fs-1 me-2"></i>
                                    <h2>Clasificación de la agresión o Vulneración de DDHH</h2>
                                </div>
                            </div>

                            <div class="card-body pt-5">

                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Tipo de agresión o vulneración de derechos:</span>
                                    </label>
                                    <div class="" data-kt-catalog-add-items="auto-options">
                                        <div id="kt_violation_typification_options">
                                            @php
                                                $categories = app(\App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\ListViolationTypeCategoriesTask::class)->run();
                                                $typification_items = $denunciation->violationTypes;
                                            @endphp
                                            <div class="form-group">
                                                <div data-repeater-list="kt_violation_typification_options" class="d-flex flex-column gap-3">
                                                    @if(count($typification_items) > 0)
                                                        @foreach($typification_items as $index => $item)
                                                        <div data-repeater-item="" class="form-group d-flex_ flex-wrap_ align-items-center_ gap-5">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="w-100 w-md-300px_">
                                                                        <select class="form-select" name="violation_type_category_option" data-hide-search="true" data-placeholder="Categoría" data-kt-violation_type_category-add="violation_type_category_option">
                                                                            <option></option>
                                                                            @foreach($categories as $index => $category)
                                                                                <option value="{{ $category->id }}" {{ $item->category->id == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="w-100 w-md-300px_">
                                                                        <select class="form-select" name="violation_type_option" data-hide-search="true" data-placeholder="Tipo de Violencia" data-kt-violation_type-add="violation_type_option" data-id="{{ $item->id }}">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-1">
                                                                    <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                                        <i class="ki-outline ki-cross fs-1"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @else
                                                    <div data-repeater-item="" class="form-group d-flex_ flex-wrap_ align-items-center_ gap-5">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="w-100 w-md-300px__">
                                                                    <select class="form-select" name="violation_type_category_option" data-hide-search="true" data-placeholder="Categoría" data-kt-violation_type_category-add="violation_type_category_option">
                                                                        <option></option>
                                                                        @foreach($categories as $index => $category)
                                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="w-100 w-md-300px__">
                                                                    <select class="form-select" name="violation_type_option" data-hide-search="true" data-placeholder="Tipo de Violencia" data-kt-violation_type-add="violation_type_option">
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                                    <i class="ki-outline ki-cross fs-1"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                                    <i class="ki-outline ki-plus fs-2"></i>Adicionar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="violation_typification_options" />
                                </div>

                            </div>

                        </div>

                        <div class="card card-flush h-lg-100 card-borderless shadow-none">

                            <div class="card-header pt-0">
                                <div class="card-title">
                                    <i class="ki-outline ki-badge fs-1 me-2"></i>
                                    <h2>Identificación de la Víctima</h2>
                                </div>
                            </div>

                            <div class="card-body pt-5">

                                <div class="fv-row mb-7">
                                    <label class="form-label mb-1">Identificación de la víctima:</label>
                                    <div class="form-check form-check-custom mb-3">
                                        <input class="form-check-input h-25px w-25px victim_identified_checkbox" type="checkbox" name="victim_identified" value="{{ $denunciation->victim_anonymous }}" data-label="Mantener en reserva/anónimo" {{ $denunciation->victim_anonymous ? 'checked="checked"' : '' }} />
                                        <label class="form-check-label fw-semibold">Mantener en reserva/anónimo</label>
                                    </div>
                                    {{--<div class="text-muted fs-7 mb-5"></div>--}}
                                </div>

                                <div id="kt_box_victim_identified">
                                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                        <div class="col">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Nombre de la víctima:</span>
                                                </label>
                                                <input type="text" class="form-control" name="victim_name" value="{{ $denunciation->victim_name }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Nombre del Medio:</span>
                                                </label>
                                                <input type="text" class="form-control" name="victim_organization" value="{{ $denunciation->victim_organization }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tipo de víctima:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('VIC');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_victim_type_select" name="victim_type">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->victim_type == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Género:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('GEN');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_victim_gender_select" name="victim_gender">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->victim_gender == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Grupo etario:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('AGE');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_victim_age_group_select" name="victim_age_group">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->victim_age_group == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="card card-flush h-lg-100 card-borderless shadow-none">

                            <div class="card-header pt-0">
                                <div class="card-title">
                                    <i class="ki-outline ki-badge fs-1 me-2"></i>
                                    <h2>Contexto de la Agresión</h2>
                                </div>
                            </div>

                            <div class="card-body pt-5">
                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Fecha de la agresión/vulneración:</span>
                                            </label>
                                            <input type="text" class="form-control datepicker_flatpickr" name="date_event" value="{{ $denunciation->date_event }}" placeholder="seleccione una fecha" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Departamento:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $states = app(\App\Containers\AppSection\Localization\Tasks\State\ListStatesTask::class)->run();
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_state_select" name="state">
                                                    <option></option>
                                                    @foreach($states as $index => $state)
                                                        <option value="{{ $state->name }}" {{ $denunciation->state == $state->name ? 'selected="selected"' : '' }}>{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Provincia:</span>
                                            </label>
                                            <input type="text" class="form-control" name="province" value="{{ $denunciation->province }}" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Localidad:</span>
                                            </label>
                                            <input type="text" class="form-control" name="region" value="{{ $denunciation->region }}" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Ciudad:</span>
                                            </label>
                                            <input type="text" class="form-control" name="city" value="{{ $denunciation->city }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Descripción del hecho:</span>
                                    </label>
                                    <textarea class="form-control" name="description_event" rows="3">{!! $denunciation->description_event !!}</textarea>
                                </div>

                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Circunstancia del hecho:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('CTX');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_circumstance_event_select" name="circumstance_event">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->circumstance_event == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="kt_box_circumstance_event_other">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Especificar circunstancia del hecho:</span>
                                                </label>
                                                <input type="text" class="form-control" name="circumstance_event_other" value="{{ $denunciation->circumstance_event_other }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Estado de denuncia de la agresión:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('STA');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_report_status_select" name="report_status">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->report_status == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="kt_box_report_sub_status">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Estado de la agresión denunciada:</span>
                                                </label>
                                                <div class="w-100">
                                                    @php
                                                        $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('SST');
                                                    @endphp
                                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                            id="kt_report_status_sub_select" name="report_sub_status">
                                                        <option></option>
                                                        @foreach($catalog?->items ?? [] as $index => $option)
                                                            <option value="{{ $option->name }}" {{ $denunciation->report_sub_status == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Acción/respuesta del estado:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('ARE');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_action_response_state_select" name="action_response_state">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->action_response_state == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Acciones de desprotección del estado:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('APE');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_action_unprotect_state_select" name="action_unprotect_state">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->action_unprotect_state == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Respuesta/Acción de gremios periodísticos:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('RGP');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_action_journalistic_unions_select" name="action_journalistic_unions">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->action_journalistic_unions == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Respuesta/Acción de Organizaciones de la Sociedad Civil :</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('ROS');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_action_organization_society_select" name="action_organization_society">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->action_organization_society == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Fuentes de información:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $catalog = app(\App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask::class)->run('SOU');
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_source_information_select" name="source_information">
                                                    <option></option>
                                                    @foreach($catalog?->items ?? [] as $index => $option)
                                                        <option value="{{ $option->name }}" {{ $denunciation->source_information == $option->name ? 'selected="selected"' : '' }}>{{ $option->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="kt_box_source_information_detail">
                                            <div class="fv-row mb-7">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Especificar fuente de información</span>
                                                </label>
                                                <input type="text" class="form-control" name="source_information_detail" value="{{ $denunciation->source_information_detail }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold form-label mt-3">
                                        <span>Enlaces de verificación (opcional):</span>
                                    </label>
                                    <div class="" data-kt-catalog-add-items="auto-options">
                                        <div id="kt_links_options">
                                            @php
                                                $urls = $denunciation->links ? json_decode($denunciation->links) : null;
                                            @endphp
                                            @if($denunciation->links)
                                                <input type="hidden" name="links" value="{{ json_encode($urls) }}">
                                            @endif
                                            <div class="form-group">
                                                <div data-repeater-list="kt_links_options" class="d-flex flex-column gap-3">
                                                    <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                                        <input type="text" class="form-control mw-100 w-350px" name="links_value" placeholder="https://www.google.com" />
                                                        <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                            <i class="ki-outline ki-cross fs-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                                    <i class="ki-outline ki-plus fs-2"></i>Adicionar enlace
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="separator separator-dashed mb-9"></div>

                        <div class="card card-flush card-borderless shadow-none">
                            <div class="card-body d-flex justify-content-center">
                                <button type="button" id="kt_denunciation_submit" class="btn btn-primary w-100">
                                    <span class="indicator-label">Guardar</span>
                                    <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>

                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script>
        var VIOLATION_DATA = @json($typification);
    </script>
    <script src="{{ asset('themes/common/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('themes/admin/js/custom/denunciation/form.js') }}"></script>
@endsection