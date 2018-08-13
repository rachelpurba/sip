<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    public function user(){
    	return $this->hasOne('App\User', 'id_pegawai');
    }

    public function penelitipsb(){
    	return $this->hasOne('App\PenelitiPSB', 'id_pegawai', 'id_peneliti');
    }
}
