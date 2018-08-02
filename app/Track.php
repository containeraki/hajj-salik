<?php
/**
 * Created by PhpStorm.
 * User: akshatsharma
 * Date: 8/2/18
 * Time: 3:41 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    //
    protected $fillable = ['location', 'information', 'shipment_id' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_date'
    ];

    public function shipment(){
        return $this->belongsTo('App\Shipment');
    }
}