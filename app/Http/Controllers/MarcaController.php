<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    public function index(){
        $marcas = Marca::paginate(4);
        return view('marca.index', ['marcas' => $marcas]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'nombre'){
                $marcas = Marca::select('marca.id', 'marca.nombre')
                ->where('marca.nombre', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(4);
                $view = view('marca.datos', compact('marcas'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function create(){
        $marcas = Marca::where('id')->get();
        return view('marca.create', ['marcas' => $marcas]);
    }
    
    public function store(Request $request){
        try {
            DB::beginTransaction();
            Marca::store($request);
            DB::commit();
            return redirect()->to('marcas')->with('message', 'Marca creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('marcas')->with('error', $e->getMessage());
        }
    }
    
    public function edit($id){
        $marca = Marca::select('marca.id', 'marca.nombre')
        ->where('marca.id', $id)
        ->first();
        return view('marca.edit', ['marca' => $marca]);
    }
    
    public function update(Request $request){
        
        try {
            DB::beginTransaction();
            Marca::actualizar($request);
            DB::commit();
            return redirect()->to('marcas')->with('message', 'Marca actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('marcas')->with('error', $e->getMessage());
        }
    }
}
