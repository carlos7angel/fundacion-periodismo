<?php

namespace App\Containers\AppSection\Localization\Data\Repositories;

use App\Containers\AppSection\Localization\Models\State;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Localization
 *
 * @extends ParentRepository<TModel>
 */
class StateRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
