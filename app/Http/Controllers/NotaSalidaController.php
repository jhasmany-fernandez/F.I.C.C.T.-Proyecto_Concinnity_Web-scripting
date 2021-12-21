<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DetalleNotaVenta as ControllersDetalleNotaVenta;
use App\Models\Detallenotasalida;
use App\Models\Producto;
use App\Models\Notasalida;
use App\Models\Tallaproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaSalidaController extends Controller
{
    public function index(){
        $notassalidas = NotaSalida::paginate(4);
        // dd(json_decode(json_encode($notasventas)));
        return view('notasalida.index', ['notassalidas' => $notassalidas]);
    }

    public function create(){
        $tallasproductos = Tallaproducto::where('condicion', 1)->where('stock', '>', 0)->with('producto')->with('talla')->get();
        //$tallasproductos = Tallaproducto::join('producto', 'tallaproducto.idproducto', 'producto.id')->where('tallaproducto.condicion', 1)->where('producto.condicion', 1)->with('talla')->get();
        // dd(json_decode(json_encode($tallasproductos)));
        return view('notasalida.create', ['tallasproductos' => $tallasproductos]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'created_at'){
                $notassalidas = Notasalida::select('notasalida.id', 'notasalida.pérdida_total', 'notasalida.descripcion', 'notasalida.created_at', 'notasalida.condicion')
                ->where('notasalida.created_at', 'LIKE', '%'.$request->input('texto').'%')
                ->paginate(4);

                $view = view('notasalida.datos', compact('notassalidas'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $errores = Notasalida::store($request);
            if($errores != ''){
                DB::rollBack();
                return response()->json(['mensaje' => $errores], 500);
            }
            DB::commit();
            return response()->json(['mensaje' => 'Nota de salida creada exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    //ver en el detalle de la nota de salida
    public function ver($idnotasalida){
        $detallesnotassalidas = Detallenotasalida::where('idnotasalida', $idnotasalida)->with('tallaproducto')->get();
        // dd(json_decode(json_encode($detallesnotasventas)));
        $notassalidas = Notasalida::find($idnotasalida);
        return view('notasalida.ver', ['detallesnotassalidas' => $detallesnotassalidas, 'notassalidas' => $notassalidas]);
    }

    public function desactivar(Request $request){
        try {
            DB::beginTransaction();
            $notasalida = Notasalida::findOrFail($request->input('id'));
            $notasalida->condicion = 0;
            $notasalida->update();
            
            $notassalidas = Notasalida::find($notasalida->id);
            $detallesnotassalidas = Detallenotasalida::whereIn('idnotasalida', $notassalidas)->get();
            //dd(json_decode(json_encode($detallesnotasventas)));
            foreach ($detallesnotassalidas as $detalle) {
                $obtener_tallaproducto_de_db = Tallaproducto::find($detalle->idtallaproducto);
                $obtener_tallaproducto_de_db->stock = $obtener_tallaproducto_de_db->stock + $detalle->cantidad;
                $obtener_tallaproducto_de_db->update();
            }
            
            DB::commit();
            return  response()->json(['mensaje' => 'Producto devuelto...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
