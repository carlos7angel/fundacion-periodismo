<?php

namespace App\Containers\AppSection\Catalog\Data\Repositories;

use App\Containers\AppSection\Catalog\Models\Catalog;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Catalog
 *
 * @extends ParentRepository<TModel>
 */
class CatalogItemRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
