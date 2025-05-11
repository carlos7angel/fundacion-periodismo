<?php

namespace App\Containers\AppSection\Catalog\UI\WEB\Controllers;

use App\Containers\AppSection\Catalog\Actions\FindCatalogByIdAction;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\FindCatalogByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindCatalogByIdController extends WebController
{
    public function show(FindCatalogByIdRequest $request)
    {
        $catalog = app(FindCatalogByIdAction::class)->run($request);
        // ...
    }
}
