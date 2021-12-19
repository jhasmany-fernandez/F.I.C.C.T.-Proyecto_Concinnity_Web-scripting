<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = User::join('personal', 'users.idpersonal', 'personal.id')
        ->join('rol', 'users.idrol', 'rol.id')
        ->select('users.id', 'users.email', 'personal.ci', 'personal.nombre', 'personal.sexo', 'personal.telefono', 'personal.direccion', 'rol.nombre as rol_nombre', 'users.condicion' , 'users.imagen')
        ->paginate(2);

        // $users2 = User::with('rol')->with('personal')->get();
        // dd(json_decode(json_encode($users)),json_decode(json_encode($users2)));
        return view('user.index', ['users' => $users]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'nombre'){
                $users = User::join('personal', 'users.idpersonal', 'personal.id')
                ->join('rol', 'users.idrol', 'rol.id')
                ->select('users.id', 'users.email', 'personal.ci', 'personal.nombre', 'personal.sexo', 'personal.telefono', 'personal.direccion', 'rol.nombre as rol_nombre', 'users.condicion', 'users.imagen')
                ->where('personal.nombre', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(2);

                $view = view('user.datos', compact('users'))->render();
                return response()->json(['view' => $view], 200);
            }
            if($request->input('opcion') == 'telefono'){
                $users = User::join('personal', 'users.idpersonal', 'personal.id')
                ->join('rol', 'users.idrol', 'rol.id')
                ->select('users.id', 'users.email', 'personal.ci', 'personal.nombre', 'personal.sexo', 'personal.telefono', 'personal.direccion', 'rol.nombre as rol_nombre', 'users.condicion', 'users.imagen')
                ->where('personal.telefono', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(2);

                $view = view('user.datos', compact('users'))->render();
                return response()->json(['view' => $view], 200);
            }
            if($request->input('opcion') == 'direccion'){
                $users = User::join('personal', 'users.idpersonal', 'personal.id')
                ->join('rol', 'users.idrol', 'rol.id')
                ->select('users.id', 'users.email', 'personal.ci', 'personal.nombre', 'personal.sexo', 'personal.telefono', 'personal.direccion', 'rol.nombre as rol_nombre', 'users.condicion', 'users.imagen')
                ->where('personal.direccion', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(2);
                
                $view = view('user.datos', compact('users'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function create(){
        $roles = Rol::where('condicion', 1)->get();
        return view('user.create', ['roles' => $roles]);
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            User::store($request);
            DB::commit();
            return redirect()->to('users')->with('message', 'Usuario creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('users')->with('error', $e->getMessage());
        }
    }
    

    public function edit($id){
        $user = User::join('personal', 'users.idpersonal', 'personal.id')
        ->join('rol', 'users.idrol', 'rol.id')
        ->select('users.id', 'users.email', 'personal.ci', 'personal.nombre', 'personal.sexo', 'personal.telefono', 'personal.direccion', 'users.idrol', 'rol.nombre as rol_nombre')
        ->where('users.id', $id)
        ->first();
        $roles = Rol::where('condicion', 1)->get();
        return view('user.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request){
        
        try {
            DB::beginTransaction();
            User::actualizar($request);
            DB::commit();
            return redirect()->to('users')->with('message', 'Usuario actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('users')->with('error', $e->getMessage());
        }
    }

    public function desactivar(Request $request){
        try {
            DB::beginTransaction();
            $user = User::findOrFail($request->input('id'));
            $user->condicion = 0;
            $user->update();
            DB::commit();
            return  response()->json(['mensaje' => 'Usuario desactivado...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }

    public function activar(Request $request){
        try {
            DB::beginTransaction();
            $user = User::findOrFail($request->input('id'));
            $user->condicion = 1;
            $user->update();
            DB::commit();
            return  response()->json(['mensaje' => 'Usuario activado...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
