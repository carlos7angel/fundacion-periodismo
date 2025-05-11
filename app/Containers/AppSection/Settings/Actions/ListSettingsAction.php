<?php

namespace App\Containers\AppSection\Settings\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Settings\Tasks\ListSettingsTask;
use App\Containers\AppSection\Settings\UI\WEB\Requests\ListSettingsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListSettingsAction extends ParentAction
{
    public function __construct(
        private readonly ListSettingsTask $listSettingsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListSettingsRequest $request): mixed
    {
        return $this->listSettingsTask->run();
    }
}
