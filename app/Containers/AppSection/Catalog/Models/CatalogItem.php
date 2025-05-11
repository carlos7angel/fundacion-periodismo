<?php

namespace App\Containers\AppSection\Catalog\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class CatalogItem extends ParentModel
{
    protected $table = 'catalog_items';

    protected $fillable = [
        'catalog_code',
        'code',
        'name',
        'description',
        'parent_code',
        'active',
        'icon',
        'sort',
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

    protected $resourceKey = 'CatalogItem';

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_code', 'code');
    }
}
