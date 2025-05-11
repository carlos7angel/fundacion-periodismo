<?php

namespace App\Containers\AppSection\Localization\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Localization\Tasks\ListLocalizationsTask;
use App\Containers\AppSection\Localization\UI\WEB\Requests\ListLocalizationsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListLocalizationsAction extends ParentAction
{
    public function __construct(
        private readonly ListLocalizationsTask $listLocalizationsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListLocalizationsRequest $request): mixed
    {
        return $this->listLocalizationsTask->run();
    }
}
