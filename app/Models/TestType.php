<?php

namespace App\Models;

use App\Models\ProvinceTest;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestType extends Model
{
    use HasEagerLimit;

    protected $table = 'test_types';
    protected $guarded = [];

    /**
     * Get all of the province_test for the TestType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function province_tests(): HasMany
    {
        return $this->hasMany(ProvinceTest::class, 'test_type_id', 'id');
    }

    /**
     * Get the province_test associated with the TestType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function province_test(): HasOne
    {
        return $this->hasOne(ProvinceTest::class, 'test_type_id', 'id')->latest('day')->limit(1);
    }
}
