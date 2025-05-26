@extends('vendor@template::landing.layouts.master')

@section('content')

    <div class="mt-lg-15 mt-15 mb-lg-20 position-relative z-index-2">
        <div class="container">
            <div class="d-flex flex-column flex-xl-row flex-row-fluid gap-8">
                <div class="d-flex flex-column justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-350px w-xxl-400px">
                    <div class="card mb-7">
                        <div class="card-body">

                            <div class="mb-15">
                                <h4 class="text-gray-900 mb-7">Menú</h4>
                                <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-semibold">
                                    <div class="menu-item mb-1">
                                        <a href="{{ route('web_index') }}" class="menu-link text-hover-info py-3">Inicio</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-16">
                                <h4 class="text-gray-900 mb-7">Búsqueda</h4>
                                <div class="position-relative">
                                    <form role="form" action="{{ route('web_index') }}" method="GET">
                                        <i class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                                        <input type="text" class="form-control form-control-solid ps-10" name="search" value="{{ $search }}" autocomplete="off" placeholder="Buscar..." />
                                    </form>
                                </div>
                            </div>

                            <div class="mb-15">
                                <h4 class="text-gray-900 mb-7">Categorias</h4>
                                <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-semibold">

                                    @php
                                        $categories = app(\App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\ListViolationTypeCategoriesTask::class)->run();
                                    @endphp
                                    @foreach($categories as $index => $item)
                                        <div class="menu-item mb-1">
                                            <a href="{{ route('web_list_by_category', ['category_id' => $item->id, 'category_name' => \Illuminate\Support\Str::slug($item->name)]) }}" class="menu-link {{ $category == $item->id ? 'text-info' : '' }} text-hover-info py-3">{{ $item->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="w-100">
                    <div class="flex-column">

                        @if($search || $category)
                            @if($category)
                                @php
                                    $category_row = app(\App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\FindViolationTypeCategoryByIdTask::class)->run($category);
                                @endphp
                                <div class="notice d-flex align-items-center bg-light-warning rounded border-warning border  mb-0 p-4">
                                    <i class="ki-outline ki-category fs-1 text-warning me-4"></i>
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-normal">
                                            <div class="fs-6 text-gray-900">
                                                Registros por categoría: <span class="fw-bold">{{ $category_row->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($search)
                                    <div class="notice d-flex align-items-center bg-light-info rounded border-primary border mb-0 p-4">
                                        <i class="ki-outline ki-filter-search fs-1 text-info me-4"></i>
                                        <div class="d-flex flex-stack flex-grow-1">
                                            <div class="fw-normal">
                                                <div class="fs-6 text-gray-900">
                                                    Registros por búsqueda: <span class="fw-bold">"{{ $search }}"</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endif

                        @if($search || $category)
                            <div class="py-5">
                                <p class="text-gray-500 p-0 m-0">Existen <b>{{ $result->total() }}</b> registro(s)</p>
                            </div>
                        @endif

                        @if (count($result) > 0)
                            @foreach($result as $denunciation)
                                <div class="card mb-5 mb-xxl-8">
                                    <div class="card-body pb-0">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-column">
                                                    <div class="me-9 mb-1">
                                                        <i class="ki-outline ki-calendar-2 text-gray-500 fs-3 me-1"></i>
                                                        <span class="fw-bold text-gray-500">
                                                            {{ \Carbon\Carbon::createFromFormat('d/m/Y', $denunciation->date_event)->translatedFormat('d \d\e F \d\e Y') }}
                                                        </span>
                                                    </div>
                                                    @php
                                                      $violation = $denunciation->violationTypes->first()
                                                    @endphp
                                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">{{ $violation->category->name }} - {{ $violation->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <p class="text-gray-800 fw-normal mb-5">
                                                {!! toShortName($denunciation->description_event, 220) !!}
                                            </p>
                                        </div>

                                        <div class="d-flex justify-content-end mb-7">
                                            <a href="{{ route('web_detail', ['id' => $denunciation->id]) }}" class="fs-7 fw-semibold link-underline-info">Ver más</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card mb-5 mb-xxl-8">
                                <div class="card-body">
                                    <div class="">
                                        <p class="text-gray-500 text-center p-0 m-0">No existen registros para mostrar.</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="kt-rows-pagination pt-5">
                            <div>{!! $result->links() !!}</div>
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