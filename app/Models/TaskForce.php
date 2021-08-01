<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Regency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskForce extends Model
{
    protected $table = 'task_forces';
    protected $guarded = [];

    /**
     * Get the regency that owns the TaskForce
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
