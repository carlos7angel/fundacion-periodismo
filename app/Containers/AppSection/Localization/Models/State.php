<?php

namespace App\Containers\AppSection\Localization\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class State extends ParentModel
{
    protected $table = 'states';

    protected $fillable = [
        'name',
        'code',
        'main_axis',
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

    protected $resourceKey = 'State';
}
