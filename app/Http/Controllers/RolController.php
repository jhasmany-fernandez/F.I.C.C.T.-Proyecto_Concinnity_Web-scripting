<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol;
use App\Models\Rol_permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function index(){
        $roles = Rol::get();
        return view('rol.index', ['roles' => $roles]);
    }

    public function create(){
        $roles = Rol::get();
        return view('rol.create', ['roles' => $roles]);
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

    public function store(Request $request){
        try {
            DB::beginTransaction();
            Rol::store($request);
            DB::commit();
            return redirect()->to('roles')->with('message', 'Rol creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('roles')->with('error', $e->getMessage());
        }
    }
    
    
    public function edit($id){
        $rol = Rol::select('rol.id', 'rol.nombre', 'rol.condicion')
        ->where('rol.id', $id)
        ->first();
        return view('rol.edit', ['rol' => $rol]);
    }
    
    public function update(Request $request){
        
        try {
            DB::beginTransaction();
            Rol::actualizar($request);
            DB::commit();
            return redirect()->to('roles')->with('message', 'Rol actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('roles')->with('error', $e->getMessage());
        }
    }

    public function ver($idrol){
        $roles_permisos = Rol_permiso::join('rol', 'rol_permiso.idrol', 'rol.id')
        ->join('permiso', 'rol_permiso.idpermiso', 'permiso.id')
        ->select('rol_permiso.id','rol_permiso.idpermiso', 'permiso.nombre as permiso_nombre')
        ->where('rol_permiso.idrol', $idrol)
        ->where('rol_permiso.condicion', 1)
        ->get();

        $rol = Rol::find($idrol);
        $permisos = Permiso::get();
        return view('rol.indexrp', ['roles_permisos' => $roles_permisos, 'rol' => $rol, 'permisos' => $permisos]);
    }

    public function updateRolPermiso(Request $request){
        try {
            DB::beginTransaction();
            Rol_permiso::updateRolpermiso($request);
            DB::commit();
            return redirect()->to('roles')->with('message', 'Rol Permiso actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->to('roles')->with('error', $e->getMessage());
        }
    }
}
