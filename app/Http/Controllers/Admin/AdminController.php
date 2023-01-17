<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hasil;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard Admin";
        return view('admin.dashboard', compact('user', 'page'));
    }

    // public function total()
    // {
        
        
    //     return view('admin.nilai.total', compact('data', 'page', 'dataSb', 'dataB', 'dataC', 'dataKb', 'dataSkb'));
    // }
}
