@extends('vendor@template::landing.layouts.master')

@section('content')

    <div class="mt-lg-15 mt-15 mb-lg-20 mb-20 position-relative z-index-2">
        <div class="container">
            <div class="d-flex flex-column flex-xl-row flex-row-fluid gap-8">
                <div class="d-flex flex-column justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-350px w-xxl-400px">
                    @include('vendor@template::landing.components.base._aside')
                </div>
                <div class="w-100">
                    <div class="flex-column">

                        <div class="card mb-5 mb-xxl-8">
                            <div class="card-body p-lg-15 pb-lg-0">
                                <div class="d-flex flex-column flex-xl-row">
                                    <div class="flex-lg-row-fluid">
                                        <div class="mb-17">
                                            <div class="mb-8">
                                                <div class="d-flex flex-wrap mb-6">
                                                    <div class="d-flex align-items-center me-9 my-1">
                                                        <i class="ki-outline ki-calendar text-primary fs-2 me-1"></i>
                                                        <span class="fw-bold text-gray-500">
                                                            <span class="fw-semibold">Fecha de la agresión: </span>
                                                            <b>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $denunciation->date_event)->translatedFormat('d \d\e F \d\e Y') }}</b>
                                                        </span>
                                                    </div>
                                                </div>
                                                @php
                                                    $violation = $denunciation->violationTypes->first()
                                                @endphp
                                                <a class="text-gray-900 fs-2 fw-bold">
                                                    <span class="fw-bold text-muted fs-5 pe-1">Tipo de agresión: </span>
                                                    {{ $violation->name }} - {{ $violation->category->name }}
                                                </a>

                                            </div>

                                            @php
                                                $violations = $denunciation->violationTypes->slice(1);
                                            @endphp
                                            @if(count($violations) > 0)
                                            <div class="fs-5 fw-semibold text-gray-600 d-flex align-items-center">
                                                <span class="fw-bold text-muted fs-5 pe-1">Otras agresiones: </span>
                                                <div>
                                                    @foreach($violations as $item)
                                                        <span>{{ $item->name }} - {{ $item->category->name }}</span><br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif

                                            <div class="fs-5 fw-semibold text-gray-600 mb-12">
                                                {!! $denunciation->description_event !!}
                                            </div>
                                            <div class="d-flex align-items-center border-1 border-dashed card-rounded p-5 p-lg-7 mb-14">
                                                <div class="mb-0 fs-6">
                                                    <div class="text-muted fw-semibold lh-lg mb-1">
                                                        Enlaces de verificación:
                                                    </div>
                                                    @php
                                                        $urls = $denunciation->links ? json_decode($denunciation->links) : null;
                                                    @endphp
                                                    @if(count($urls) > 0)
                                                        <p class="form-control form-control-plaintext pb-0">
                                                            @foreach($urls as $url)
                                                                <a href="{{ $url }}" target="_blank" class="">{{ $url }}</a><br>
                                                            @endforeach
                                                        </p>
                                                    @else
                                                        <p class="form-control form-control-plaintext py-0 pb-0">-</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <style>
    </style>
@endsection

@section('scripts')

@endsection