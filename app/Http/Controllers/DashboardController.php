<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::check()) {
            if(Auth::user()->idrol == 1)
            {
                return view('dashboard.index_administrador');
            }
            if(Auth::user()->idrol == 2)
            {
                return view('dashboard.index_vendedor');
            }
        }
    }
}
