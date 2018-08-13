<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\TipeKegiatan;
use App\Peneliti;
use App\PenelitiNonPSB;

class PenelitiNonPSBController extends Controller
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
        $penelitinonpsbs = PenelitiNonPSB::orderBy('nama_peneliti', 'asc')->get();
        if (Auth::check()) {
            return view('penelitinonpsb.index', compact('penelitinonpsbs'));
        }
        if (Auth::guest()) {
            return view('penelitinonpsbUmum.index', compact('penelitinonpsbs'));
        }
    }

    public function indeks($id)
    {
        $penelitinonpsbs = PenelitiNonPSB::where('nama_peneliti', 'LIKE', $id.'%')->get();
        return view('penelitinonpsbUmum.indeks', compact('penelitinonpsbs'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penelitinonpsb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_peneliti' => 'nullable',
            'nama_peneliti' => 'required',
            'tipe_identitas' => 'required',
            'no_identitas' => 'required',
        ]); 

        $penelitinonpsbs = PenelitiNonPSB::where([ ['tipe_identitas', $request->input('tipe_identitas')], ['no_identitas', $request->input('no_identitas')] ])->get();
        if (!empty($penelitinonpsbs)){
            Session::flash('warning', 'Identitas Peneliti Non Biofarmaka Sudah Ada');
            return redirect()->route('penelitinonpsb.create');
        } else {
            $peneliti = new Peneliti;
            $peneliti->save();
            $penelitinonpsb = new PenelitiNonPSB;
            $penelitinonpsb->id_peneliti = $peneliti->id;
            $penelitinonpsb->nama_peneliti = $request->input('nama_peneliti');
            $penelitinonpsb->tipe_identitas = $request->input('tipe_identitas');
            $penelitinonpsb->no_identitas = $request->input('no_identitas');
            $penelitinonpsb->save();
            Session::flash('success', 'Peneliti Non Biofarmaka Berhasil Ditambah');
            return redirect()->route('penelitinonpsb.index');
        }
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
        $penelitinonpsb = PenelitiNonPSB::findOrFail($id);
        if (Auth::check()) {
            return view('penelitinonpsb.show', compact('tipekegiatans', 'penelitinonpsb'));
        }
        if (Auth::guest()) {
            return view('penelitinonpsbUmum.show', compact('tipekegiatans', 'penelitinonpsb'));
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
        $penelitinonpsb = PenelitiNonPSB::findOrFail($id);
        return view('penelitinonpsb.edit', compact('penelitinonpsb'));
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

        $this->validate($request, [
            'nama_peneliti' => 'required',
            'tipe_identitas' => 'required',
            'no_identitas' => 'required',
        ]); 

        $penelitinonpsb = PenelitiNonPSB::findOrFail($id);
        $penelitinonpsb->nama_peneliti = $request->input('nama_peneliti');
        $penelitinonpsb->tipe_identitas = $request->input('tipe_identitas');
        $penelitinonpsb->no_identitas = $request->input('no_identitas');
        $penelitinonpsb->save();

        Session::flash('success', 'Peneliti Non Biofarmaka Berhasil Diubah');
        return redirect()->route('penelitinonpsb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $penelitinonpsb = PenelitiNonPSB::findOrFail($request->delete_id);
        $penelitinonpsb->delete();

        Session::flash('success', 'Peneliti Non Biofarmaka Berhasil Dihapus');
        return redirect()->route('penelitinonpsb.index');
    }
}
