<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    public $timestamps = false;
    protected $table = 'fakultas';
    protected $fillable = ['nama_fakultas'];

    public function departemen(){
        return $this->hasMany('App\Depertemen', 'id_fakultas');
    }
}
