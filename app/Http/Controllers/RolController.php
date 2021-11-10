<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function index(){
        $roles = Rol::get();
        return view('rol.index', ['roles' => $roles]);
    }

    public function desactivar(Request $request){
        try {
            DB::beginTransaction();
            $rol = Rol::findOrFail($request->input('id'));
            $rol->condicion = 0;
            $rol->update();
            DB::commit();
            return  response()->json(['mensaje' => 'Rol desactivado...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return  response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }

    public function activar(Request $request){
        try {
            DB::beginTransaction();
            $rol = Rol::findOrFail($request->input('id'));
            $rol->condicion = 1;
            $rol->update();
            DB::commit();
            return  response()->json(['mensaje' => 'Rol activado...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return  response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
