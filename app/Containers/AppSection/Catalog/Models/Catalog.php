<?php

namespace App\Containers\AppSection\Catalog\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Catalog extends ParentModel
{
    protected $table = 'catalogs';

    protected $fillable = [
        'code',
        'name',
        'description',
        'active',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $resourceKey = 'Catalog';

    public function items()
    {
        return $this->hasMany(CatalogItem::class, 'catalog_code', 'code')->where(['parent_code' => NULL]);
    }
}
