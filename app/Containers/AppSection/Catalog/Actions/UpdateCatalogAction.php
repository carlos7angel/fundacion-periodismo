<?php

namespace App\Containers\AppSection\Catalog\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Catalog\Models\Catalog;
use App\Containers\AppSection\Catalog\Tasks\UpdateCatalogTask;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\UpdateCatalogRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCatalogAction extends ParentAction
{
    public function __construct(
        private readonly UpdateCatalogTask $updateCatalogTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCatalogRequest $request): Catalog
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateCatalogTask->run($data, $request->id);
    }
}
