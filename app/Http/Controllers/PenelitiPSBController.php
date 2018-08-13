<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TipeKegiatan;
use App\PenelitiPSB;
use PDF;
use Carbon\Carbon;


class PenelitiPSBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('preventBackLogout');
        $this->middleware('auth', ['except' => ['index', 'indeks', 'show']]);
    }
    
    public function index()
    {   
        $penelitipsbs = PenelitiPSB::whereHas('pegawai', function($query) { $query->orderBy('nama', 'asc'); })->get();
        if (Auth::check()) {
            return view('penelitipsb.index', compact('penelitipsbs'));
        }
        if (Auth::guest()) {
            return view('penelitipsbUmum.index', compact('penelitipsbs'));
        }
    }
    
    public function indeks($id)
    {
        $penelitipsbs = PenelitiPSB::whereHas('pegawai', function($query) use($id) { $query->where('nama', 'LIKE', $id.'%'); })->get();
        return view('penelitipsbUmum.indeks', compact('penelitipsbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $tipekegiatans = TipeKegiatan::all();
        $penelitipsb = PenelitiPSB::where('id_pegawai', $id)->first();
        if (Auth::check()) {
            return view('penelitipsb.show', compact('tipekegiatans', 'penelitipsb'));
        }
        if (Auth::guest()) {
            return view('penelitipsbUmum.show', compact('tipekegiatans', 'penelitipsb'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePDF($id)
    {
      $penelitipsb = PenelitiPSB::where('id_pegawai', $id)->first();
      $tanggal_3 = Carbon::now();
      $tanggal_5 = Carbon::now();
      $tanggal_3 = $tanggal_3->subYears(3);
      $tanggal_5 = $tanggal_5->subYears(5);
      $penelitians = $penelitipsb->kegiatan()->where('id_tipe_kegiatan', '=', 1)
                                             ->orWhere('id_tipe_kegiatan', '=', 2)
                                             ->whereYear('tanggal_akhir', '>=', '$tanggal_3->year')->get();
      $seminars = $penelitipsb->kegiatan()->where('id_tipe_kegiatan', '=', 4)
                                          ->whereYear('tanggal_akhir', '>=', '$tanggal_5->year')->get();
      $publikasijurnals = $penelitipsb->publikasijurnal()->where('tahun_terbit', '>=', '$tanggal_3->year')->get();
      $publikasibukus = $penelitipsb->publikasibuku()->where('tahun_terbit', '>=', '$tanggal_3->year')->get();
      $pdf = PDF::loadView('penelitipsb.pdf', compact('penelitipsb', 'penelitians', 'seminars', 'publikasijurnals', 'publikasibukus'));
      return $pdf->download('CV_'.$penelitipsb->pegawai->nama.'.pdf');
    }
}
