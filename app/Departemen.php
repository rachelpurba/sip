<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    public $timestamps = false;
    protected $table = 'departemen';
    protected $fillable = ['nama_departemen', 'id_fakultas'];

    public function fakultas(){
        return $this->belongsTo('App\Fakultas', 'id_fakultas');
    }
}
