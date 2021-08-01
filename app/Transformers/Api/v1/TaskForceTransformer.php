<?php

namespace App\Transformers\Api\v1;

use App\Models\Regency;
use League\Fractal\TransformerAbstract;

class TaskForceTransformer extends TransformerAbstract
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
    public function transform(Regency $regency)
    {
        $task_forces = [];
        $contacts =
            $regency->task_forces->map(function ($task_force) {
                return  $task_force->contacts->map(function ($contact) use ($task_force) {
                    return [
                        __('general.contact_type') => $contact->contact_type->name,
                        __('general.contact') => $contact->contact,
                        __('general.name') => $task_force->name,
                        __('general.label') => $contact->contact_type->label,
                        __('general.prefix') => $contact->contact_type->prefix,
                    ];
                });
            });

        foreach ($contacts as $task_force) {
            foreach ($task_force as $contact) {
                $task_forces[] = $contact;
            }
        }

        return [
            __('general.district') => $regency->name,
            __('general.contacts') => $task_forces,
        ];
    }
}
