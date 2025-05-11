<?php

namespace App\Containers\AppSection\FileManager\UI\WEB\Controllers;

use App\Containers\AppSection\FileManager\Actions\CreateFileManagerAction;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\CreateFileManagerRequest;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\StoreFileManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateFileManagerController extends WebController
{
    public function create(CreateFileManagerRequest $request)
    {
    }

    public function store(StoreFileManagerRequest $request)
    {
        $fileManager = app(CreateFileManagerAction::class)->run($request);
        // ...
    }
}
