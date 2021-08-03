<?php

namespace App\Models;

use App\Models\ContactType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $guarded = [];

    /**
     * Get the contact_type that owns the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact_type(): BelongsTo
    {
        return $this->belongsTo(ContactType::class, 'contact_type_id', 'id');
    }

    public function contactable()
    {
        return $this->morphTo();
    }
}
