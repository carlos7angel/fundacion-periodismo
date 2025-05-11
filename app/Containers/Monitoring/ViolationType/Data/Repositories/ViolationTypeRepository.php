<?php

namespace App\Containers\Monitoring\ViolationType\Data\Repositories;

use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of ViolationType
 *
 * @extends ParentRepository<TModel>
 */
class ViolationTypeRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
