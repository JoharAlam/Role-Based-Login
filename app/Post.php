<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'catagory', 'auther_name', 'body', 'publish'
    ];

    protected $attributes = [
   'publish' => 0,
];

//     public function setis_booleanAttribute($value)
// {
//         $this->attributes['is_boolean'] = ($value=='on')?($value=1):($value=0);
// }
}
