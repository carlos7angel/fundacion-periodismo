<?php

namespace App\Containers\Monitoring\Denunciation\Data\Repositories;

use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Denunciation
 *
 * @extends ParentRepository<TModel>
 */
class DenunciationRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
