<?php

namespace App\Containers\Monitoring\Denunciation\Models;

use App\Containers\Monitoring\ViolationType\Models\ViolationType;
use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Denunciation extends ParentModel
{
    protected $fillable = [
        'code',
        'aggressor_type',
        'aggressor_subtype',
        'aggressor_identified',
        'aggressor_name',
        'aggressor_organization',
        'aggressor_job_title',
        'victim_anonymous',
        'victim_name',
        'victim_organization',
        'victim_type',
        'victim_gender',
        'victim_age_group',
        'date_event',
        'time_event',
        'state',
        'province',
        'region',
        'city',
        'description_event',
        'circumstance_event',
        'circumstance_event_other',
        'details_event_audio',
        'details_event_images',
        'details_event_files',
        'report_status',
        'action_response_state',
        'action_unprotect_state',
        'action_journalistic_unions',
        'action_organization_society',
        'source_information_detail',
        'source_information',
        'status',
        'created_by',
    ];

    protected $table = 'denunciations';

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'date_event',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected string $resourceKey = 'Denunciation';

    public function violationTypes(): BelongsToMany
    {
        return $this->belongsToMany(ViolationType::class, 'denunciation_has_violation_types', 'fid_denunciation', 'fid_violation_type');
    }

    protected function dateEvent(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value
            ? null : Carbon::parse($value)->format('d/m/Y'),
            set: static fn (string|null $value): string|null => null === $value
            ? null : Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d')
        );
    }

    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: static fn (string|null $value): string|null => null === $value
            ? null : Carbon::parse($value)->format('d/m/Y h:i A'),
        );
    }
}
