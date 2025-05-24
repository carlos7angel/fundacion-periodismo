<?php

namespace App\Containers\Monitoring\Report\Data\Repositories;

use App\Containers\Monitoring\Report\Models\Report;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Report
 *
 * @extends ParentRepository<TModel>
 */
class ReportRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
