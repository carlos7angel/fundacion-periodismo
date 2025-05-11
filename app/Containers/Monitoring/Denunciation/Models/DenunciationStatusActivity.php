<?php

namespace App\Containers\Monitoring\Denunciation\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DenunciationStatusActivity extends ParentModel
{
    protected $fillable = [
        'fid_denunciation',
        'status',
        'previous_status',
        'registered_by',
        'registered_at',
        'observations',
    ];

    protected $table = 'denunciation_status_activity';

    public $timestamps = false;

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'registered_at',
    ];

    protected string $resourceKey = 'DenunciationStatusActivity';

    public function user()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }

    protected function registeredAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value
            ? null : Carbon::parse($value)->format('d/m/Y h:i A'),
        );
    }
}
