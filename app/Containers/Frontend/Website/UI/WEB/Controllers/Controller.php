<?php

namespace App\Containers\Frontend\Website\UI\WEB\Controllers;


use App\Containers\Frontend\Website\UI\WEB\Requests\PageDetailRequest;
use App\Containers\Frontend\Website\UI\WEB\Requests\PageIndexRequest;
use App\Containers\Frontend\Website\UI\WEB\Requests\PageListByCategoryRequest;
use App\Containers\Monitoring\Denunciation\Tasks\FindDenunciationByIdTask;
use App\Containers\Monitoring\Denunciation\Tasks\ListDenunciationsWithPaginationTask;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index(PageIndexRequest $request)
    {
        $page_title = "Inicio";
        $denunciations = app(ListDenunciationsWithPaginationTask::class)->run($request);
        $search = $request->get('search') ? trim($request->get('search')) : null;
        return view('frontend@website::index', [
            'result' => $denunciations,
            'search' => $search,
            'category' => null
        ], compact('page_title'));
    }
    public function listByCategory(PageListByCategoryRequest $request)
    {
        $page_title = "Por categoría";
        $denunciations = app(ListDenunciationsWithPaginationTask::class)->run($request);
        $search = $request->get('search') ? trim($request->get('search')) : null;
        $category = isset($request->category_id) ? $request->category_id : null;
        return view('frontend@website::index', [
            'result' => $denunciations,
            'search' => $search,
            'category' => $category
        ], compact('page_title'));
    }

    public function detail(PageDetailRequest $request)
    {
        $page_title = "Detalle";
        $denunciation = app(FindDenunciationByIdTask::class)->run($request->id);
        return view('frontend@website::detail', [
            'denunciation' => $denunciation,
            'search' => null,
            'category' => null
        ], compact('page_title'));
    }

}
