<?php

namespace App\Containers\AppSection\FileManager\UI\WEB\Controllers;

use App\Containers\AppSection\FileManager\Actions\FindFileManagerByIdAction;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\FindFileManagerByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindFileManagerByIdController extends WebController
{
    public function show(FindFileManagerByIdRequest $request)
    {
        $fileManager = app(FindFileManagerByIdAction::class)->run($request);
        // ...
    }
}
