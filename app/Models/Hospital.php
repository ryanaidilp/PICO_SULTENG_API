<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Regency;
use App\Models\HospitalBed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hospital extends Model
{
    protected $table = 'hospitals';
    protected $guarded = [];

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    /**
     * Get the regency that owns the Hospital
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    /**
     * Get all of the beds for the Hospital
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beds(): HasMany
    {
        return $this->hasMany(HospitalBed::class, 'hospital_id', 'id');
    }
}
