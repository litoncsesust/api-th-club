<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name',
        'post_code',
        'city',
        'email',
        'telephone',
        'mobile',
        'address',
        'contact_person',
        'short_description',
    ];
}
