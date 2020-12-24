<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id','first_name', 'last_name', 'profile_picture','short_description', 'point_expire_date', 'point'
    ];
}
