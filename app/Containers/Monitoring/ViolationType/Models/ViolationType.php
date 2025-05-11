<?php

namespace App\Containers\Monitoring\ViolationType\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class ViolationType extends ParentModel
{
    protected $table = 'violation_types';

    protected $fillable = [
        'fid_violation_type_category',
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

    protected string $resourceKey = 'ViolationType';

    public function category()
    {
        return $this->belongsTo(ViolationTypeCategory::class, 'fid_violation_type_category');
    }


}
