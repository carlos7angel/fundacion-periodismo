<?php

namespace App\Containers\AppSection\Catalog\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Catalog\Tasks\ListCatalogsTask;
use App\Containers\AppSection\Catalog\UI\WEB\Requests\ListCatalogsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCatalogsAction extends ParentAction
{
    public function __construct(
        private readonly ListCatalogsTask $listCatalogsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListCatalogsRequest $request): mixed
    {
        return $this->listCatalogsTask->run();
    }
}
