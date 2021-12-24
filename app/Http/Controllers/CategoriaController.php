<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Bitacora;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::paginate(4);
        return view('categoria.index', ['categorias' => $categorias]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'nombre'){
                $categorias = Categoria::select('categoria.id', 'categoria.nombre')
                ->where('categoria.nombre', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(4);
                $view = view('categoria.datos', compact('categorias'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function create(){
        $categorias = Categoria::where('id')->get();
        return view('categoria.create', ['categorias' => $categorias]);
    }
    
    public function store(Request $request){
        try {
            DB::beginTransaction();
            Categoria::store($request);
            DB::commit();
            return redirect()->to('categorias')->with('message', 'Categoria creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('categorias')->with('error', $e->getMessage());
        }
    }
    
    public function edit($id){
        $categoria = Categoria::select('categoria.id', 'categoria.nombre')
        ->where('categoria.id', $id)
        ->first();
        return view('categoria.edit', ['categoria' => $categoria]);
    }
    
    public function update(Request $request){
        
        try {
            DB::beginTransaction();
            Categoria::actualizar($request);
            DB::commit();
            return redirect()->to('categorias')->with('message', 'Categoria actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('categorias')->with('error', $e->getMessage());
        }
    }
}
