<?php

namespace App\Containers\Monitoring\Report\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Report\Tasks\FindReportByYearTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllReportsYearlyTask extends ParentAction
{
    public function __construct(
        private FindReportByYearTask $findReportByYearTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        return $this->findReportByYearTask->run();
    }
}
