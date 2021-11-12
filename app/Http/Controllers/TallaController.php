<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talla;
use Illuminate\Support\Facades\DB;

class TallaController extends Controller
{
    public function index(){
        $tallas = Talla::get();
        return view('talla.index', ['tallas' => $tallas]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'nombre'){
                $tallas = Talla::select('talla.id', 'talla.nombre')
                ->where('talla.nombre', 'LIKE', '%'.$request->input('texto').'%')
                ->get();
                $view = view('talla.datos', compact('tallas'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function create(){
        $tallas = Talla::where('id')->get();
        return view('talla.create', ['tallas' => $tallas]);
    }
    
    public function store(Request $request){
        try {
            DB::beginTransaction();
            Talla::store($request);
            DB::commit();
            return redirect()->to('tallas')->with('message', 'Talla creado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('tallas')->with('error', $e->getMessage());
        }
    }
    
    public function edit($id){
        $talla = Talla::select('talla.id', 'talla.nombre')
        ->where('talla.id', $id)
        ->first();
        return view('talla.edit', ['talla' => $talla]);
    }
    
    public function update(Request $request){
        try {
            DB::beginTransaction();
            Talla::actualizar($request);
            DB::commit();
            return redirect()->to('tallas')->with('message', 'Talla actualizado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('tallas')->with('error', $e->getMessage());
        }
    }
}
