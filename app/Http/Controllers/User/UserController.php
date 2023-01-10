<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dt1 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Dikirim')->count();
        $dt2 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Diterima')->count();
        $dt3 = DB::table('izins')->get()->where('user_id',Auth::user()->id)-> where('status', 'Ditolak')->count();
        $page = "Dasboard User";
        return view('user.dashboard', compact('user', 'dt1', 'dt2', 'dt3', 'page'));
    }
}
