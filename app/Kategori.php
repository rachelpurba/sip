<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $timestamps = false;
    protected $table = 'kategori_tipe_kegiatan';

    protected $fillable = ['nama_kategori', 'id_tipe_kegiatan', 'keterangan'];

    public function tipekegiatan(){
    	return $this->belongsTo('App\TipeKegiatan', 'id_tipe_kegiatan');
    }
}
