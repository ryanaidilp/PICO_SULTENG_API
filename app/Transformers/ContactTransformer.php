<?php

namespace App\Transformers;

use App\Models\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            trans('general.contact_type') => $contact->contact_type->name,
            trans('general.contact') => $contact->contact,
            trans('general.prefix') => $contact->contact_type->prefix,
            trans('general.label') => $contact->contact_type->label,
        ];
    }
}
