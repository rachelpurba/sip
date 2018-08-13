<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peneliti extends Model
{
    public $timestamps = false;
    protected $table = 'peneliti';

    public function penelitipsb(){
    	return $this->hasOne('App\PenelitiPSB', 'id_peneliti');
    }

    public function penelitinonpsb(){
    	return $this->hasOne('App\PenelitiNonPSB', 'id_peneliti');
    }
}
