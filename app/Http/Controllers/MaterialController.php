<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function index(){
        $materiales = Material::paginate(4);
        return view('material.index', ['materiales' => $materiales]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'nombre'){
                $materiales = Material::select('material.id', 'material.nombre')
                ->where('material.nombre', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(4);;
                $view = view('material.datos', compact('materiales'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function create(){
        $materiales = Material::where('id')->get();
        return view('material.create', ['materiales' => $materiales]);
    }
    
    public function store(Request $request){
        try {
            DB::beginTransaction();
            Material::store($request);
            DB::commit();
            return redirect()->to('materiales')->with('message', 'Material creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('materiales')->with('error', $e->getMessage());
        }
    }
    
    public function edit($id){
        $material = Material::select('material.id', 'material.nombre')
        ->where('material.id', $id)
        ->first();
        return view('material.edit', ['material' => $material]);
    }
    
    public function update(Request $request){
        try {
            DB::beginTransaction();
            Material::actualizar($request);
            DB::commit();
            return redirect()->to('materiales')->with('message', 'Material actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('materiales')->with('error', $e->getMessage());
        }
    }
}
