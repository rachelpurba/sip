<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    public $timestamps = false;
    protected $table = 'berkas';
    protected $fillable = ['id_kegiatan', 'nama_berkas', 'id_tipe_berkas'];

    public function tipeberkas(){
        return $this->belongsTo('App\TipeBerkas', 'id_tipe_berkas');
    }

    public function kegiatan(){
    	return $this->belongsTo('App\Kegiatan');
    }
}
