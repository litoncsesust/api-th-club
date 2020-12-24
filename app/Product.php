<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        's_title',
        'user_id',
        'category_id',
        'sku',
        'club_id',
        'offer_date',
        'book_by_date',
        'total_number',
        'initial_point',
        'headline',
        'description',
        'short_description',
        'seller_club',
        'seller_address',
        'seller_postcode',
        'seller_city',
        'contact_person',
        'seller_email',
        'seller_telephone',
        'seller_description',
        'isFeatured',
    ];

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function clubs(){
        return $this->belongsTo('App\Club', 'club_id');
    }
   
}
