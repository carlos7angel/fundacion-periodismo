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
        <li class="breadcrumb-item text-white fw-bold lh-1">{{ $action }}</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">{{ $action }} Registro
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3"></span>
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
                        <h1 class="fs-2hx fw-bold mb-5">
                            Informe
                            {{ ucwords(strtolower($type)) }}
                        </h1>
                        <div class="text-gray-600 fw-semibold fs-5"></div>
                    </div>

                    <div class="separator separator-dashed mb-9"></div>

                    <!--begin::Form-->
                    <form id="kt_document_form" class="form" action="{{ route('admin_document_store') }}" method="post" autocomplete="off">

                        <input type="hidden" name="document_id" value="{{ $document->id }}">
                        <input type="hidden" name="document_type" value="{{ $type }}">

                        <div class="card card-flush h-lg-100 card-borderless shadow-none">

                            <div class="card-body pt-5">

                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Gestión:</span>
                                            </label>
                                            <div class="w-100">
                                                @php
                                                    $years = range(2000,date('Y'));
                                                @endphp
                                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                        id="kt_document_year" name="document_year" {{ $action === 'Editar' ? 'disabled' : '' }}>
                                                    <option></option>
                                                    @foreach($years as $index => $year)
                                                        <option value="{{ $year }}" {{ $year == $document->year ? 'selected="selected"' : '' }}>{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-7">
                                            <div id="kt_box_quarter">
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span class="required">Trimestre:</span>
                                                </label>
                                                <div class="w-100">
                                                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción"
                                                            id="kt_document_quarter" name="document_quarter" {{ $action === 'Editar' ? 'disabled' : '' }}>
                                                        <option></option>
                                                        <option value="Q1" {{ "Q1" == $document->quarter ? 'selected="selected"' : '' }}>1er Trimestre (Enero - Marzo)</option>
                                                        <option value="Q2" {{ "Q2" == $document->quarter ? 'selected="selected"' : '' }}>2do Trimestre (Abril - Junio)</option>
                                                        <option value="Q3" {{ "Q3" == $document->quarter ? 'selected="selected"' : '' }}>3er Trimestre (Julio - Septiembre)</option>
                                                        <option value="Q4" {{ "Q4" == $document->quarter ? 'selected="selected"' : '' }}>4to Trimestre (Octubre - Diciembre)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    @if($document->fileReport)
                                        <input type="hidden" name="file_report_data" data-name="{{ $document->fileReport->origin_name }}" data-size="{{ $document->fileReport->size }}"
                                               data-mimetype="{{ $document->fileReport->mime_type }}" data-path="{{ $document->fileReport->url_file }}">
                                    @endif
                                    <label class="form-label">
                                        <span class="required">Documento:</span>
                                    </label>
                                    <input type="file" name="file_report" class="files"
                                           id="kt_file_report" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
                                    <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formato de archivo: PDF</div>
                                </div>

                            </div>
                        </div>

                        <div class="separator separator-dashed mb-9"></div>

                        <div class="card card-flush card-borderless shadow-none">
                            <div class="card-body d-flex justify-content-center">
                                <button type="button" id="kt_document_submit" class="btn btn-primary w-100">
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
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/font/font-fileuploader.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader-theme-dropin.css') }}" media="all" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('themes/common/plugins/custom/fileuploader/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/admin/js/custom/document/form.js') }}"></script>
@endsection