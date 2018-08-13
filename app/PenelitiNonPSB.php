<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenelitiNonPSB extends Model
{
	public $timestamps = false;
    protected $table = 'peneliti_nonpsb';
    protected $primaryKey = 'id_peneliti';

    protected $fillable = ['id_peneliti', 'nama_peneliti', 'tipe_identitas', 'no_identitas'];

    public function peneliti(){
    	return $this->belongsTo('App\Pegawai', 'id_peneliti');
    }

    public function publikasijurnal(){
    	return $this->belongsToMany('App\PublikasiJurnal', 'peserta_publikasi_jurnal', 'id_peneliti', 'id_publikasi_jurnal')->withPivot('status_konfirm');
    }

    public function publikasibuku(){
        return $this->belongsToMany('App\PublikasiBuku', 'peserta_publikasi_buku', 'id_peneliti', 'id_publikasi_buku')->withPivot('status_konfirm');
    }

    public function kegiatan(){
        return $this->belongsToMany('App\Kegiatan', 'peserta_kegiatan', 'id_peneliti', 'id_kegiatan')->withPivot('status_konfirm', 'id_peran');
    }
}
