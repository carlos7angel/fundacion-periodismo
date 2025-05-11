<?php

namespace App\Containers\AppSection\FileManager\UI\WEB\Controllers;

use App\Containers\AppSection\FileManager\Actions\ListFileManagersAction;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\ListFileManagersRequest;
use App\Ship\Parents\Controllers\WebController;

class ListFileManagersController extends WebController
{
    public function index(ListFileManagersRequest $request)
    {
        $fileManagers = app(ListFileManagersAction::class)->run($request);
        // ...
    }
}
