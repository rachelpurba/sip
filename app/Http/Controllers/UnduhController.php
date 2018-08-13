<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

use App\Kegiatan;
use App\PublikasiJurnal;
use App\PublikasiBuku;

class UnduhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('preventBackLogout');
      $this->middleware('auth');
    }
    
    public function index()
    {
        return view('unduh.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['tahun' => 'required']);
        $tahun = $request->input('tahun');
        return redirect()->action('UnduhController@generatePDF', $tahun);
    }

    public function generatePDF($id)
    {
        $penelitian = Kegiatan::where('id_tipe_kegiatan', '=', 1)
                              ->whereYear('tanggal_awal', '=', $id)->get();
        $kerjasama = Kegiatan::where('id_tipe_kegiatan', '=', 2)
                             ->whereYear('tanggal_awal', '=', $id)->get();
        $pembicaraInternasional = Kegiatan::where([ ['id_tipe_kegiatan', '=', 4], ['id_kategori_tipe_kegiatan', '=', 23] ])
                                          ->whereYear('tanggal_awal', '=', $id)
                                          ->whereHas('penelitipsb', function($query) { $query->where('id_peran', '=', 3); })
                                          ->get();
        $pemakalahInternasional = Kegiatan::where([ ['id_tipe_kegiatan', '=', 4], ['id_kategori_tipe_kegiatan', '=', 23] ])
                                          ->whereYear('tanggal_awal', '=', $id)
                                          ->whereHas('penelitipsb', function($query) { $query->where('id_peran', '=', 4); })
                                          ->get();
        $narasumber = Kegiatan::where([ ['id_tipe_kegiatan', '=', 4], ['id_kategori_tipe_kegiatan', '=', 24] ])
                              ->orWhere([ ['id_tipe_kegiatan', '=', 4], ['id_kategori_tipe_kegiatan', '=', 25] ])
                              ->whereYear('tanggal_awal', '=', $id)
                              ->get();
        $jurnalNasional = PublikasiJurnal::where('status_akreditasi', '=', 'Terakreditasi Nasional')
                                         ->where('tahun_terbit', '=', $id)->get();
        $jurnalNasionalB = PublikasiJurnal::where('status_akreditasi', 'LIKE', '%Nasional Belum%')
                                         ->where('tahun_terbit', '=', $id)->get();
        $jurnalInternasional = PublikasiJurnal::where('status_akreditasi', 'LIKE', '%Internasional%')
                                              ->where('tahun_terbit', '=', $id)->get();
        $kerjasamaNasional = Kegiatan::where('id_tipe_kegiatan', '=', 2)
                                          ->whereYear('tanggal_awal', '=', $id)
                                          ->get();
        $publikasibuku = PublikasiBuku::where('tahun_terbit', '=', $id)->get();
        $pdf = PDF::loadView('unduh.pdf', compact('penelitian', 'kerjasama', 'pembicaraInternasional', 'pemakalahInternasional', 'narasumber', 'jurnalNasional', 'jurnalNasionalB', 'jurnalInternasional', 'kerjasamaNasional', 'publikasibuku', 'id'));
        return $pdf->download('LampiranCapaianPUI_'.$id.'.pdf');
    }
}
