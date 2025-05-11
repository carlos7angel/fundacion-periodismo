<?php

namespace App\Containers\AppSection\Catalog\UI\WEB\Controllers;

use App\Containers\AppSection\Catalog\Actions\DeleteCatalogAction;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\DeleteCatalogRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteCatalogController extends WebController
{
    public function destroy(DeleteCatalogRequest $request)
    {
        $result = app(DeleteCatalogAction::class)->run($request);
        // ...
    }
}
