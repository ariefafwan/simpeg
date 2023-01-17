<?php

namespace App\Http\Controllers\User;

use App\Models\Hasil;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard User";
        return view('user.dashboard', compact('user', 'page'));
    }

    public function show()
    {
        $user = Auth::user();
        $page = "Hasil Penilaian";
        $data = Hasil::all()->where('user_id', Auth::user()->id);

        $chart = Hasil::all()->where('user_id', Auth::user()->id);
        foreach ($chart as $n) {
            $op = $n->nilai;
        }
        $sangatBaik = $op == 10;
        $baik = $op <= 9.9;
        $cukup = $op <= 8.9;
        $kurangBaik = $op <= 7.9;
        $sangatKurangBaik = $op <= 6.9;

        $dataSb = $chart->where('nilai', 10)->count();
        $dataB = $chart->whereBetween('nilai', [9, 9.9])->count();
        $dataC = $chart->whereBetween('nilai', [8, 8.9])->count();
        $dataKb = $chart->whereBetween('nilai', [7, 7.9])->count();
        $dataSkb = $chart->whereBetween('nilai', [6, 6.9])->count();
        
        return view('user.hasil', compact('user', 'page', 'data', 'dataSb', 'dataB', 'dataC', 'dataKb', 'dataSkb'));
    }

    // public function show()
    // {
    //     $user = Auth::user();
    //     $page = "Hasil Penilaian";
    //     $data = Hasil::all()->where('user_id', Auth::user()->id);

    //     return view('user.hasil', compact('user', 'page', 'data'));
    // }
}
