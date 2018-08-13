<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeBerkas extends Model
{
    public $timestamps = false;
    protected $table = 'tipe_berkas';

    protected $fillable = ['nama_tipe_berkas'];

    public function berkas(){
    	return $this->hasOne('App\Berkas', 'id_tipe_berkas');
    }

	public function tipekegiatan(){
        return $this->belongsToMany('App\TipeKegiatan', 'berkas_kegiatan','id_tipe_berkas', 'id_tipe_kegiatan');
    } 
}
