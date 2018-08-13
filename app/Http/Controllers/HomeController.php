<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Kegiatan;
use App\TipeKegiatan;
use App\PublikasiBuku;
use App\PublikasiJurnal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('preventBackLogout');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipekegiatans = TipeKegiatan::all();
        $kegiatans = Kegiatan::where('tanggal_akhir', '>=', date('Y-m-d'))->get();
        return view('home', compact('tipekegiatans', 'kegiatans'));
    }
}
