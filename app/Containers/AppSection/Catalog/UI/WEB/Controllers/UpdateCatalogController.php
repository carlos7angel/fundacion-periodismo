<?php

namespace App\Containers\AppSection\Catalog\UI\WEB\Controllers;

use App\Containers\AppSection\Catalog\Actions\FindCatalogByIdAction;
use App\Containers\AppSection\Catalog\Actions\UpdateCatalogAction;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\EditCatalogRequest;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\UpdateCatalogRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateCatalogController extends WebController
{
    public function edit(EditCatalogRequest $request)
    {
        $catalog = app(FindCatalogByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateCatalogRequest $request)
    {
        $catalog = app(UpdateCatalogAction::class)->run($request);
        // ...
    }
}
