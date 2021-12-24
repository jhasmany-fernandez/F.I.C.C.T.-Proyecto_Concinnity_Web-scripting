<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'condicion' => 1])) {
            $request->session()->regenerate();

            $bitacora = new Bitacora();
            $bitacora->accion = 'Inició Sesión';
            $bitacora->idusuario = Auth::user()->id;
            $bitacora->save();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        $bitacora = new Bitacora();
        $bitacora->accion = 'Salió Sesión';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->save();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
