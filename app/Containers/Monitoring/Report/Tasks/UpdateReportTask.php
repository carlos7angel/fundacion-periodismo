<?php

namespace App\Containers\Monitoring\Report\Tasks;

use App\Containers\Monitoring\Report\Data\Repositories\ReportRepository;
use App\Containers\Monitoring\Report\Models\Report;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateReportTask extends ParentTask
{
    public function __construct(
        private readonly ReportRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Report
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
