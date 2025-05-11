<?php

namespace App\Containers\AppSection\FileManager\UI\WEB\Controllers;

use App\Containers\AppSection\FileManager\Actions\FindFileManagerByIdAction;
use App\Containers\AppSection\FileManager\Actions\UpdateFileManagerAction;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\EditFileManagerRequest;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\UpdateFileManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateFileManagerController extends WebController
{
    public function edit(EditFileManagerRequest $request)
    {
        $fileManager = app(FindFileManagerByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateFileManagerRequest $request)
    {
        $fileManager = app(UpdateFileManagerAction::class)->run($request);
        // ...
    }
}
