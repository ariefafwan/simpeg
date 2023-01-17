<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Hasil Penilaian";
        $pegawai = User::all()->where('role_id', '2');
        $data = Hasil::all();

        $chart = Hasil::all();
        foreach ($chart as $n) {
            $jlhNilai = $n->nilai;
        }
        $sangatBaik = $jlhNilai == 10;
        $baik = $jlhNilai <= 9.9;
        $cukup = $jlhNilai <= 8.9;
        $kurangBaik = $jlhNilai <= 7.9;
        $sangatKurangBaik = $jlhNilai <= 6.9;

        $dataSb = $chart->where('nilai', 10)->count();
        $dataB = $chart->whereBetween('nilai', [9, 9.9])->count();
        $dataC = $chart->whereBetween('nilai', [8, 8.9])->count();
        $dataKb = $chart->whereBetween('nilai', [7, 7.9])->count();
        $dataSkb = $chart->whereBetween('nilai', [6, 6.9])->count();
        
        return view('admin.nilai.hasil', compact('user', 'page', 'data', 'pegawai', 'dataSb', 'dataB', 'dataC', 'dataKb', 'dataSkb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Penilaian";
        $hasil = Hasil::all();
        $pertanyaan = Pertanyaan::all();
        // $count = $hasil->count();
        $pegawai = User::all()->where('role_id', '2');
        return view('admin.nilai.input', compact('user', 'page', 'hasil', 'pegawai', 'pertanyaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->data;

        $total = array_sum($data);
        $jumlah = count($data);

        $n = ($total / $jumlah);
        $nilai = floatval($n);

        // $idusr = Auth::user()->id;
        // $idmhs = Mahasiswa::where('user_id', $idusr)->first('id');
        // dd($idmhs);  

        if ($nilai <= 6.9) {
            $grade = "Sangat Kurang Baik";
        } else if ($nilai <= 7.9) {
            $grade = "Kurang Baik";
        } else if ($nilai <= 8.9) {
            $grade = "Cukup";
        } else if ($nilai <= 9.9) {
            $grade = "Baik";
        } else if ($nilai == 10) {
            $grade = "Sangat Baik";
        }

        Hasil::create([
            'user_id' => $request->user_id,
            'matakuliah_id' => $request->matakuliah,
            'nilai' => $nilai,
            'tgl_nilai' => $request->tgl_nilai,
            'saran' => $request->saran,
            'grade' => $grade
        ]);

        return redirect()->route('hasil.index')->with('success', 'Data Penilaian Berhasil ditambahkan');
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
        $hasil = Hasil::findOrFail($id);
        $hasil->delete();

        return redirect()->route('hasil.index')
            ->with('updatesuccess', 'Berhasil Dihapus');
    }
}
