<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
	protected $table = 'berita';
    protected $fillable = ['judul_berita', 'konten_berita', 'berkas'];
}
