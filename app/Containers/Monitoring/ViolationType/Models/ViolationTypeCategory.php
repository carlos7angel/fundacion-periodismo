<?php

namespace App\Containers\Monitoring\ViolationType\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class ViolationTypeCategory extends ParentModel
{
    protected $table = 'violation_type_categories';

    protected $fillable = [
        'name',
        'description',
        'icon',
        'image',
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

    protected string $resourceKey = 'ViolationTypeCategory';

    public function items()
    {
        return $this->hasMany(ViolationType::class, 'fid_violation_type_category');
    }
}
