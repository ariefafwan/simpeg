<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Daftar Pertanyaan";
        $pertanyaan = Pertanyaan::all();
        return view('admin.pertanyaan.pertanyaan', compact('user', 'page', 'pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Pertanyaan";
        $pertanyaan = Pertanyaan::all();
        $kriteria = Kriteria::all();
        return view('admin.pertanyaan.create', compact('user', 'page', 'pertanyaan', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtUpload = new Pertanyaan();
        $dtUpload->name = $request->name;
        $dtUpload->kriteria_id = $request->kriteria_id;

        $dtUpload->save();


        return redirect()->route('pertanyaan.index')
            ->with('updatesuccess', 'pertanyaan Berhasil Ditambahkan');
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
        $page = "Edit Pertanyaan";
        $pertanyaan = Pertanyaan::findOrFail($id);
        $kriteria = Kriteria::all();
        return view('admin.pertanyaan.edit', compact('user', 'page', 'pertanyaan', 'kriteria'));
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
        $dtUpload = Pertanyaan::find($id);
        $dtUpload->name = $request->name;
        $dtUpload->kriteria_id = $request->kriteria_id;

        $dtUpload->save();

        return redirect()->route('pertanyaan.index')->with(['message' => 'successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index')
            ->with('updatesuccess', 'Berhasil Dihapus');
    }
}
