<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublikasiJurnal extends Model
{	
	public $timestamps = false;
	protected $table = 'publikasi_jurnal';
    protected $fillable = ['judul_artikel', 'status_akreditasi', 'nama_berkala', 'volume_halaman', 'url', 'berkas_jurnal', 'tahun_terbit'];

    public function penelitipsb(){
    	return $this->belongsToMany('App\PenelitiPSB', 'peserta_publikasi_jurnal', 'id_publikasi_jurnal', 'id_peneliti')->withPivot('status_konfirm');
    }

    public function penelitinonpsb(){
        return $this->belongsToMany('App\PenelitiNonPSB', 'peserta_publikasi_jurnal', 'id_publikasi_jurnal', 'id_peneliti')->withPivot('status_konfirm');
    }
}