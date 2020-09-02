<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Peminjam;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $pinjam = Peminjam::orderBy('created_at','DESC');
        return view('admin.dashboard',['pinjam' => $pinjam])->with('welcome',);
    }

    public function user()
    {
        $user = User::all();
        return view('layouts.side',['user' => $user]);
    }
}
