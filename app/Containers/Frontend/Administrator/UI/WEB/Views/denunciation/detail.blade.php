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
        <li class="breadcrumb-item text-white fw-bold lh-1">Detalle</li>
    </ul>
@endsection

@section('headline')
    <div class="page-title d-flex align-items-center me-3">
        <h1 class="page-heading d-flex text-white fw-bolder fs-1 flex-column justify-content-center my-0">Detalle del Caso
            <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-3">Casos de agresión/vulneración</span>
        </h1>
    </div>
    <div class="d-flex gap-4 gap-lg-13">
    </div>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content">

        <div class="d-flex flex-column flex-xl-row flex-row-fluid gap-10">

            <div class="d-flex flex-column justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-350px">

                <div class="card border border-dashed border-gray-300 mb-7">
                    <div class="card-body">
                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">DATOS DEL DOCUMENTO</h6>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Tipo de documento:</div>
                            <div class="fw-bold text-gray-800 fs-6">Reporte Agresión/Vulneración</div>
                        </div>
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Nro Documento:</div>
                            <div class="fw-bold text-gray-800 fs-6">{{ $denunciation->code }}</div>
                        </div>
                        <div class="mb-0">
                            <div class="fw-semibold text-gray-600 fs-7">Fecha de creacion:</div>
                            <div class="fw-bold text-gray-800 fs-6">{{ $denunciation->created_at }}</div>
                        </div>


                        @if($denunciation->status === 'NEW')
                            <div class="d-flex flex-wrap mt-8">
                                <a href="#" class="btn btn-link btn-color-gray-500 text-decoration-underline btn-active-color-primary me-5 mb-2">
                                    <i class="ki-outline ki-pencil fs-3 me-1"></i>Editar
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-100">

                <div class="flex-column">
                    <div class="card d-flex flex-row-fluid flex-center mb-10">
                        <div class="card-body p-12 w-100">

                            <div class="pb-10 pb-lg-12">
                                <h2 class="fw-bold text-gray-900 fs-4 text-uppercase d-flex align-items-center">
                                    <i class="ki-outline ki-document text-gray-700 fs-1 me-2"></i>
                                    <span>Datos del Caso</span>
                                </h2>
                                <div class="text-muted fw-semibold fs-7"></div>
                            </div>

                            <div id="wrapper-summary-denunciation">

                                <h6 class="mb-5 fw-bolder text-primary">Identificación del Perpetrador/Agresor</h6>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Tipo de perpetrador o agresor:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->aggressor_type }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Identificación del perpetrador o agresor:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">
                                            @if($denunciation->aggressor_identified)
                                                <span>Identificado</span>
                                            @else
                                                <span>Sin información/anónimo</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                @if($denunciation->aggressor_identified)

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Nombre:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->aggressor_name }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Institución:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->aggressor_organization }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Cargo:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->aggressor_job_title }}</p>
                                    </div>
                                </div>

                                @endif

                                <div class="separator separator-dashed border-muted"></div>

                                <h6 class="mb-5 mt-10 fw-bolder text-primary">Clasificación de la agresión o Vulneración de DDHH</h6>

                                <div class="row">
                                    <div class="col-md-12 d-flex align-items-center mt-5">
                                        <div class="flex-grow-1">
                                            <div class="table-responsive">
                                                <table class="table table-bordered align-middle gs-0 gy-4 mb-3" aria-describedby="table">
                                                    <thead>
                                                    <tr class="border-bottom bg-light fs-6 fw-bold text-muted">
                                                        <th class="ps-4 rounded-start min-w-300px">Categoría</th>
                                                        <th class="min-w-300px text-start rounded-end">Tipo de Agresión</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($denunciation->violationTypes as $key => $violation_type)
                                                        <tr class="fw-bold text-gray-700 fs-7 text-end">
                                                            <td class="ps-4 text-start pt-6">
                                                                {{ $violation_type->category->name }}
                                                            </td>
                                                            <td class="text-start pt-6">
                                                                {{ $violation_type->name }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mb-5 mt-10 fw-bolder text-primary">Identificación de la Víctima</h6>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Identificación de la víctima:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">
                                            @if($denunciation->victim_identified)
                                                <span>Identificado</span>
                                            @else
                                                <span>En reserva/anónimo</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                @if($denunciation->victim_identified)

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Nombre de la víctima:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->victim_name }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Nombre del Medio:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->victim_organization }}</p>
                                    </div>
                                </div>

                                @endif

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Tipo de víctima:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->victim_type }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Género:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->victim_gender }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Grupo etario:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->victim_age_group }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <h6 class="mb-5 mt-10 fw-bolder text-primary">Contexto de la Agresión</h6>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Fecha de la agresión:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->date_event }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Departamento:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->state }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Provincia:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->province ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Localidad:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->region ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Ciudad:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->city ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Descripción del hecho:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->description_event }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Circunstancia del hecho:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">
                                            @if ($denunciation->circumstance_event === 'Otro')
                                                <span>(Otro) {{ $denunciation->circumstance_event_other }}</span>
                                            @else
                                                <span>{{ $denunciation->circumstance_event }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Estado de denuncia de la agresión:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->report_status }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                @if($denunciation->report_status === 'Agresión denunciada formalmente')
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Estado de la agresión denunciada:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->report_sub_status }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>
                                @endif

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Acción/respuesta del estado:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->action_response_state }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Acciones de desprotección del estado:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->action_unprotect_state }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Respuesta/Acción de gremios periodísticos:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->action_journalistic_unions }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Respuesta/Acción de Organizaciones de la Sociedad Civil:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->action_organization_society }}</p>
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Fuentes de información:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="form-control form-control-plaintext">{{ $denunciation->source_information }}</p>
                                    </div>
                                </div>

                                @if ($denunciation->source_information === 'Organización de la Sociedad Civil' ||
                                    $denunciation->source_information === 'Gremio periodístico' ||
                                    $denunciation->source_information === 'Publicación /nota de prensa')
                                    <div class="separator separator-dashed border-muted"></div>

                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                            <label class="fw-semibold fs-7 text-gray-600">Fuentes de información especificado:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="form-control form-control-plaintext">{{ $denunciation->source_information_detail }}</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="separator separator-dashed border-muted"></div>

                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end text-end">
                                        <label class="fw-semibold fs-7 text-gray-600">Enlaces de verificación:</label>
                                    </div>
                                    <div class="col-md-8">
                                        @php
                                            $urls = $denunciation->links ? json_decode($denunciation->links) : null;
                                        @endphp
                                        @if(count($urls) > 0)
                                            <p class="form-control form-control-plaintext">
                                            @foreach($urls as $url)
                                                <a href="{{ $url }}" target="_blank" class="">{{ $url }}</a><br>
                                            @endforeach
                                            </p>
                                        @else
                                            <p class="form-control form-control-plaintext py-0 pb-1">-</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="separator separator-dashed border-muted"></div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('modals')
    <div class="modal fade" id="kt_modal_update_denunciation_status" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form id="kt_form_update_status_denunciation" class="form" method="post" autocomplete="off"
                          action="{{ route('admin_denunciation_update_status', ['id' => $denunciation->id]) }}">
                        <div class="mb-10 text-center">
                            <h1 class="mb-3">Registro</h1>
                            <div class="text-muted fw-semibold fs-5">Actualizar</div>
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span>Cambiar a:</span>
                            </label>
                            <input type="text" class="form-control form-check-solid" name="readonly_denunciation_status" value="" readonly disabled />
                            <input type="hidden" name="denunciation_status" value="">
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Comentarios/Observaciones:</label>
                            <textarea class="form-control" rows="6" name="denunciation_observations" placeholder=""></textarea>
                        </div>
                        <div class="text-center">
                            <button type="button" id="kt_button_update_status_cancel" class="btn btn-light btn-sm me-3">Cancelar</button>
                            <button type="submit" id="kt_button_update_status_submit" class="btn btn-primary btn-sm">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Espere por favor...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/denunciation/detail.js') }}"></script>
@endsection