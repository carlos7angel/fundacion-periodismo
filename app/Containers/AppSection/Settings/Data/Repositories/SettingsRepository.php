<?php

namespace App\Containers\AppSection\Settings\Data\Repositories;

use App\Containers\AppSection\Settings\Models\Settings;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Settings
 *
 * @extends ParentRepository<TModel>
 */
class SettingsRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
