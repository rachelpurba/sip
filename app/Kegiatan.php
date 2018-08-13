<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
	public $timestamps = false;
    protected $table = 'kegiatan';
    protected $fillable = ['id_tipe_kegiatan', 'nama_kegiatan', 'tanggal_awal', 'tanggal_akhir', 'keterangan'];

    public function tipekegiatan(){
        return $this->belongsTo('App\TipeKegiatan', 'id_tipe_kegiatan');
    }

    public function penelitipsb(){
    	return $this->belongsToMany('App\PenelitiPSB', 'peserta_kegiatan', 'id_kegiatan', 'id_peneliti')->withPivot('status_konfirm', 'id_peran');
    }

    public function penelitinonpsb(){
        return $this->belongsToMany('App\PenelitiNonPSB', 'peserta_kegiatan', 'id_kegiatan', 'id_peneliti')->withPivot('status_konfirm', 'id_peran');
    }

    public function berkas(){
    	return $this->hasMany('App\Berkas', 'id_kegiatan');
    }
}
