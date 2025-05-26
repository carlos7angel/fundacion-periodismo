@extends('vendor@template::admin.layouts.auth')

@section('content')
    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <div class="w-lg-500px p-10">
            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('admin_post_forgot_password') }}"
                  method="post" autocomplete="off">

                {{ csrf_field() }}

                <input type="hidden" name="reseturl" value="{{ $reseturl }}">

                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">¿Olvidaste tu contraseña?</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Ingresa tu correo para restablecer tu contraseña</div>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger d-flex align-items-center p-5 mb-15">
                        <i class="ki-duotone ki-shield-cross fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-danger">Advertencia</h4>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success d-flex align-items-center p-5 mb-15">
                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-success">Correo enviado</h4>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                <div class="fv-row mb-8">
                    <input type="text" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" autocomplete="off" class="form-control bg-transparent" />
                </div>

                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                        <span class="indicator-label">Enviar</span>
                        <span class="indicator-progress">Espere por favor...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <a href="{{ route('admin_show_login') }}" class="btn btn-light">Cancelar</a>
                </div>

            </form>
        </div>
    </div>

    <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
        <div class="me-10">
        </div>
        <div class="d-flex fw-semibold text-primary fs-base gap-5">
            <a href="#" target="_blank" rel="noopener">Contáctanos</a>
        </div>
    </div>

@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('themes/admin/js/custom/auth/forgot-password.js') }}"></script>
@endsection
