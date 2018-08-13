<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublikasiBuku extends Model
{	
	public $timestamps = false;
	protected $table = 'publikasi_buku';
    protected $fillable = ['judul_buku', 'judul_book_chapter', 'nama_penerbit', 'tahun_terbit', 'isbn'];

    public function penelitipsb(){
    	return $this->belongsToMany('App\PenelitiPSB', 'peserta_publikasi_buku', 'id_publikasi_buku', 'id_peneliti')->withPivot('status_konfirm');
    }

    public function penelitinonpsb(){
        return $this->belongsToMany('App\PenelitiNonPSB', 'peserta_publikasi_buku', 'id_publikasi_buku', 'id_peneliti')->withPivot('status_konfirm');
    }
}