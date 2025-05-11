<?php

namespace App\Containers\AppSection\Catalog\Actions;

use App\Containers\AppSection\Catalog\Models\Catalog;
use App\Containers\AppSection\Catalog\Tasks\FindCatalogByIdTask;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\FindCatalogByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCatalogByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindCatalogByIdTask $findCatalogByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindCatalogByIdRequest $request): Catalog
    {
        return $this->findCatalogByIdTask->run($request->id);
    }
}
