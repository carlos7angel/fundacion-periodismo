<?php

namespace App\Containers\Monitoring\Denunciation\Data\Repositories;

use App\Containers\Monitoring\Denunciation\Models\DenunciationStatusActivity;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of DenunciationStatusActivity
 *
 * @extends ParentRepository<TModel>
 */
class DenunciationStatusActivityRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
