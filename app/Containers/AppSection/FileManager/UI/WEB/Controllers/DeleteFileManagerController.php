<?php

namespace App\Containers\AppSection\FileManager\UI\WEB\Controllers;

use App\Containers\AppSection\FileManager\Actions\DeleteFileManagerAction;
use App\Containers\AppSection\FileManager\UI\WEB\Requests\DeleteFileManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteFileManagerController extends WebController
{
    public function destroy(DeleteFileManagerRequest $request)
    {
        $result = app(DeleteFileManagerAction::class)->run($request);
        // ...
    }
}
