<?php

namespace App\Containers\AppSection\Catalog\UI\WEB\Controllers;

use App\Containers\AppSection\Catalog\Actions\ListCatalogsAction;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\ListCatalogsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListCatalogsController extends WebController
{
    public function index(ListCatalogsRequest $request)
    {
        $catalogs = app(ListCatalogsAction::class)->run($request);
        // ...
    }
}
