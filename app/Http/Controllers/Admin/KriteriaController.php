<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Kriteria Penilaian";
        $kriteria = Kriteria::all();
        return view('admin.kriteria.kriteria', compact('user', 'page', 'kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Kriteria";
        $kriteria = Kriteria::all();
        return view('admin.kriteria.create', compact('user', 'page', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtUpload = new Kriteria();
        $dtUpload->name = $request->name;

        $dtUpload->save();


        return redirect()->route('kriteria.index')
            ->with('updatesuccess', 'kriteria Berhasil Ditambahkan');
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
        $user = Auth::user();
        $page = "Edit Kriteria";
        $kriteria = Kriteria::findOrFail($id);
        return view('admin.kriteria.edit', compact('user', 'page', 'kriteria'));
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
        $dtUpload = Kriteria::find($id);
        $dtUpload->name = $request->name;

        $dtUpload->save();

        return redirect()->route('kriteria.index')->with(['message' => 'successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('kriteria.index')
            ->with('updatesuccess', 'Berhasil Dihapus');
    }
}
