<?php

namespace App\Containers\AppSection\FileManager\Data\Repositories;

use App\Containers\AppSection\FileManager\Models\File;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of FileManager
 *
 * @extends ParentRepository<TModel>
 */
class FileRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
