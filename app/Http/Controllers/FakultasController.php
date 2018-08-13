<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Fakultas;

class FakultasController extends Controller
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
        $fakultass = Fakultas::orderBy('nama_fakultas', 'asc')->get();
        return view('fakultas.index', compact('fakultass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('fakultas.create');
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
            'nama_fakultas' => 'required'
        ]);
        $fakultas = new Fakultas;
        $fakultas->nama_fakultas = $request->input('nama_fakultas');
        $fakultas->save();

        Session::flash('success', 'Fakultas Berhasil Ditambah');
        return redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view('fakultas.edit', compact('fakultas'));
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
        $fakultas = Fakultas::findOrFail($id);
        $this->validate($request, [
            'nama_fakultas' => 'required'
        ]);
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->nama_fakultas = $request->input('nama_fakultas');
        $fakultas->save();

        Session::flash('success', 'Fakultas Berhasil Diubah');
        return redirect()->route('fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $fakultas = Fakultas::findOrFail($request->delete_id);
        $fakultas->delete();
        Session::flash('success', 'Fakultas Berhasil Dihapus');
        return redirect()->route('fakultas.index');
    }
}
