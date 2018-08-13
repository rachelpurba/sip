<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Departemen;
use App\Fakultas;

class DepartemenController extends Controller
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
        $departemens = Departemen::orderBy('nama_departemen', 'asc')->get();
        return view('departemen.index', compact('departemens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $fakultass = Fakultas::all();
        return view('departemen.create', compact('fakultass'));
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
            'nama_departemen' => 'required',
            'fakultas' => 'required'
        ]);
        $departemen = new Departemen;
        $departemen->nama_departemen = $request->input('nama_departemen');
        $departemen->id_fakultas = $request->input('fakultas');
        $departemen->save();

        Session::flash('success', 'Departemen Berhasil Ditambah');
        return redirect()->route('departemen.index');
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
        $departemen = Departemen::findOrFail($id);
        $fakultass = Fakultas::all();
        return view('departemen.edit', compact('departemen', 'fakultass'));
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
        $departemen = Departemen::findOrFail($id);
        $this->validate($request, [
            'nama_departemen' => 'required',
            'fakultas' => 'required'
        ]);
        $departemen = Departemen::findOrFail($id);
        $departemen->nama_departemen = $request->input('nama_departemen');
        $departemen->id_fakultas = $request->input('fakultas');
        $departemen->save();

        Session::flash('success', 'Departemen Berhasil Diubah');
        return redirect()->route('departemen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $departemen = Departemen::findOrFail($request->delete_id);
        $departemen->delete();
        Session::flash('success', 'Departemen Berhasil Dihapus');
        return redirect()->route('departemen.index');
    }
}
