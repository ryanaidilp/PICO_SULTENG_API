<?php

namespace App\Models;

use App\Models\Regency;
use App\Models\Hospital;
use App\Models\ProvinceCase;
use App\Models\ProvinceTest;
use App\Models\ProvinceVaccine;
use App\Models\VaccineLocation;
use App\Models\ProvinceGenderCase;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Province extends Model
{
    use HasEagerLimit;

    protected $table = 'provinces';
    protected $guarded = [];
    public $incrementing = false;

    /**
     * Get all of the regencies for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class, 'province_id', 'id');
    }

    /**
     * Get all of the cases for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(ProvinceCase::class, 'province_id', 'id');
    }

    /**
     * Get the case associated with the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function case(): HasOne
    {
        return $this->hasOne(ProvinceCase::class, 'province_id', 'id')->latest('day')->limit(1);
    }

    /**
     * Get all of the gender_cases for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gender_cases(): HasMany
    {
        return $this->hasMany(ProvinceGenderCase::class, 'province_id', 'id');
    }

    /**
     * Get the gender_case associated with the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gender_case(): HasOne
    {
        return $this->hasOne(ProvinceGenderCase::class, 'province_id', 'id')->latest('day')->limit(1);
    }

    /**
     * Get all of the hospitals for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function hospitals(): HasManyThrough
    {
        return $this->hasManyThrough(
            Hospital::class,
            Regency::class,
            'province_id',
            'regency_id',
            'id',
            'id'
        );
    }

    /**
     * Get all of the task_forces for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function task_forces(): HasManyThrough
    {
        return $this->hasManyThrough(
            TaskForce::class,
            Regency::class,
            'province_id',
            'regency_id',
            'id',
            'id'
        );
    }

    /**
     * Get all of the tests for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tests(): HasMany
    {
        return $this->hasMany(ProvinceTest::class, 'province_id', 'id');
    }

    /**
     * Get the test associated with the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function test(): HasOne
    {
        return $this->hasOne(ProvinceTest::class, 'province_id', 'id')->latest('day')->limit(1);
    }

    /**
     * Get all of the vaccines for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vaccines(): HasMany
    {
        return $this->hasMany(ProvinceVaccine::class, 'province_id', 'id');
    }

    /**
     * Get the vaccine associated with the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vaccine(): HasOne
    {
        return $this->hasOne(ProvinceVaccine::class, 'province_id', 'id')->latest('day')->limit(1);
    }

    /**
     * Get all of the vaccine_locations for the Province
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function vaccine_locations(): HasManyThrough
    {
        return $this->hasManyThrough(
            VaccineLocation::class,
            Regency::class,
            'province_id',
            'regency_id',
            'id',
            'id'
        );
    }
}
