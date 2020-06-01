<?php

namespace App\Transformers;

use App\District;
use League\Fractal\TransformerAbstract;

class PostsTransformer extends TransformerAbstract
{
    public function transform(District $district)
    {
        $posts = array();
        foreach ($district->posts as $key => $post) {
            $posts[$key][trans('general.no')] = $key + 1;
            $posts[$key][trans('general.name')] = $post->nama;
            foreach ($post->phones as $idx => $phone) {
                $posts[$key][trans('general.phone')][$idx] = $phone->phone;
            }
        }

        return [
            trans('general.no') => $district->no,
            trans('general.name') => $district->kabupaten,
            trans('general.posts') => $posts,
        ];
    }
}
