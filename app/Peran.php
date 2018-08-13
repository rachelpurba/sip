<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    public $timestamps = false;
	protected $table = 'peran';

	protected $fillable = ['nama_peran'];

	public function tipekegiatan(){
    	return $this->belongsToMany('App\TipeKegiatan', 'peran_kegiatan', 'id_peran', 'id_tipe_kegiatan');
    }
}
