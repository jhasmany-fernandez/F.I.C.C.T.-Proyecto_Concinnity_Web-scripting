<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

            if (Auth::user()->idrol == 1){
                return redirect()->intended('dashboard');
            }else{
                return redirect()->intended('dashboard2');
            }
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

    public function olvidar_contraseña(){
        $users = User::select('users.email', 'users.password')->where('id')->get();
        return view('olvidar_contraseña', ['users' => $users]);
    }

    // public function nueva_contraseña(Request $request){
    //     try {
    //         DB::beginTransaction();
    //         Cliente::actualizar($request);
    //         DB::commit();
    //         return redirect()->to('clientes')->with('message', 'Cliente actualizado exitosamente');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect('clientes')->with('error', $e->getMessage());
    //     }
    // }
}
