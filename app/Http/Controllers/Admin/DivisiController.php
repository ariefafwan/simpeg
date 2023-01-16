<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Daftar Divisi";
        $divisi = Divisi::all();
        return view('admin.divisi.divisi', compact('user', 'page', 'divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Divisi";
        $divisi = Divisi::all();
        return view('admin.divisi.create', compact('user', 'page', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtUpload = new Divisi();
        $dtUpload->name = $request->name;

        $dtUpload->save();


        return redirect()->route('divisi.index')
            ->with('updatesuccess', 'Divisi Berhasil Ditambahkan');
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
        $page = "Edit Divisi";
        $divisi = Divisi::findOrFail($id);
        return view('admin.divisi.edit', compact('user', 'page', 'divisi'));
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
        $dtUpload = Divisi::find($id);
        $dtUpload->name = $request->name;

        $dtUpload->save();

        return redirect()->route('divisi.index')->with(['message' => 'successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        return redirect()->route('divisi.index')
            ->with('updatesuccess', 'Berhasil Dihapus');
    }
}
