<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    //
    protected $fillable = ['title', 'type', 'created_date', 'user_id','status','shipment_to','shipment_from','partner' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_date'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function track(){
        return $this->hasMany('App\Track');
    }
}