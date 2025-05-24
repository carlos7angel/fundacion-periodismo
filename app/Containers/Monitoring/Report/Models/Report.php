<?php

namespace App\Containers\Monitoring\Report\Models;

use App\Containers\AppSection\FileManager\Models\File;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Report extends ParentModel
{
    protected $fillable = [
        'name',
        'type',
        'year',
        'quarter',
        'file_report',
        'description',
        'active'
    ];

    protected $table = 'reports';

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

    protected string $resourceKey = 'Report';

    public function fileReport()
    {
        return $this->hasOne(File::class, 'unique_code', 'file_report');
    }

    /**
     * Mutators
     */
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value ? null : Carbon::parse($value)
            ->format('d/m/Y h:i A'),
        );
    }
}
