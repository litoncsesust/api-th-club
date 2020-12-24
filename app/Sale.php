<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'total_quantity',
        'total_point',
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function profile(){
        return $this->belongsTo('App\Profile', 'user_id');
    }


    public function sales_items()
	  {
	      return $this->hasMany('App\SalesItem');
	  }
}
