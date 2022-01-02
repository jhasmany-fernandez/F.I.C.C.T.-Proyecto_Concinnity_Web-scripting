<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermisoController extends Controller
{
    public function index(){
        $permisos = Permiso::paginate(4);
        return view('permiso.index', ['permisos' => $permisos]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'nombre'){
                $permisos = Permiso::select('permiso.id', 'permiso.nombre', 'permiso.condicion')
                ->where('permiso.nombre', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(4);
                $view = view('permiso.datos', compact('permisos'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function create(){
        $permisos = Permiso::where('id')->get();
        return view('permiso.create', ['permisos' => $permisos]);
    }
    
    public function store(Request $request){
        try {
            DB::beginTransaction();
            Permiso::store($request);
            DB::commit();
            return redirect()->to('permisos')->with('message', 'Permiso creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('permisos')->with('error', $e->getMessage());
        }
    }
    
    public function edit($id){
        $permiso = Permiso::select('permiso.id', 'permiso.nombre')
        ->where('permiso.id', $id)
        ->first();
        return view('permiso.edit', ['permiso' => $permiso]);
    }

    public function update(Request $request){
        try {
            DB::beginTransaction();
            Permiso::actualizar($request);
            DB::commit();
            return redirect()->to('permisos')->with('message', 'Permiso actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('permisos')->with('error', $e->getMessage());
        }
    }

    public function eliminar(Request $request){
        try {
            DB::beginTransaction();
            $permiso = Permiso::findOrFail($request->input('id'));
            $permiso->condicion = 0;
            $permiso->delete();

            DB::commit();
            return  response()->json(['mensaje' => 'Permiso eliminado...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
