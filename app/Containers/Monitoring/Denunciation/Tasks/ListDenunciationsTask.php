<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListDenunciationsTask extends ParentTask
{
    public function __construct(
        private DenunciationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($_skip_paginate = true): mixed
    {
        return $_skip_paginate ? $this->repository->addRequestCriteria()->all() : $this->repository->addRequestCriteria()->paginate();
    }
}
