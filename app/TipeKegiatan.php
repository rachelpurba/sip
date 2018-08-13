<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeKegiatan extends Model
{
    public $timestamps = false;
    protected $table = 'tipe_kegiatan';

    protected $fillable = ['nama_tipe_kegiatan', 'dokumentasi'];

    public function kategori(){
        return $this->hasMany('App\Kategori', 'id_tipe_kegiatan');
    }

    public function kegiatan(){
    	return $this->hasOne('App\Kegiatan', 'id_tipe_kegiatan');
    }

    public function tipeberkas(){
        return $this->belongsToMany('App\TipeBerkas', 'berkas_kegiatan', 'id_tipe_kegiatan', 'id_tipe_berkas');
    }

    public function peran(){
    	return $this->belongsToMany('App\Peran', 'peran_kegiatan', 'id_tipe_kegiatan', 'id_peran');
    }
}
