<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Notacompra;
use App\Models\Detallenotacompra;
use App\Models\Tallaproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaCompraController extends Controller
{
    public function index(){
        $notascompras = Notacompra::with('proveedor')->with('user')->paginate(4);
        // dd(json_decode(json_encode($notascompras)));
        return view('notacompra.index', ['notascompras' => $notascompras]);
    }

    public function create(){
        $tallasproductos = Tallaproducto::where('condicion', 1)->with('producto')->with('talla')->get();
        //$tallasproductos = Tallaproducto::join('producto', 'tallaproducto.idproducto', 'producto.id')->where('tallaproducto.condicion', 1)->where('producto.condicion', 1)->with('talla')->get();
        // dd(json_decode(json_encode($tallasproductos)));
        $proveedores = Proveedor::get();
        return view('notacompra.create', ['proveedores' => $proveedores, 'tallasproductos' => $tallasproductos]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'proveedor'){
                $notascompras = Notacompra::join('proveedor', 'notacompra.idproveedor', 'proveedor.id')->where('proveedor.nombre', 'LIKE', '%'.$request->input('texto').'%')->get();
                $ids_proveedores = array();
                foreach ($notascompras as $value) {
                    array_push($ids_proveedores, $value->idproveedor);
                }

                $notascompras = Notacompra::whereIn('idproveedor', $ids_proveedores)->with('proveedor')->with('user')
                ->paginate(4);

                $view = view('notacompra.datos', compact('notascompras'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $errores = Notacompra::store($request);
            if($errores != ''){
                DB::rollBack();
                return response()->json(['mensaje' => $errores], 500);
            }
            DB::commit();
            return response()->json(['mensaje' => 'Nota de compra creada exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    //ver en el detalle de la nota de venta
    public function ver($idnotacompra){
        $detallesnotascompras = Detallenotacompra::where('idnotacompra', $idnotacompra)->with('tallaproducto')->get();
        // dd(json_decode(json_encode($detallesnotascompras)));
        $proveedores = Proveedor::get();
        $notascompras = Notacompra::find($idnotacompra);
        return view('notacompra.ver', ['proveedores' => $proveedores, 'detallesnotascompras' => $detallesnotascompras, 'notascompras' => $notascompras]);
    }

    public function desactivar(Request $request){
        try {
            DB::beginTransaction();
            $notacompra = Notacompra::findOrFail($request->input('id'));
            $notacompra->condicion = 0;
            $notacompra->update();
            
            $notascompras = Notacompra::find($notacompra->id);
            $detallesnotascompras = Detallenotacompra::whereIn('idnotacompra', $notascompras)->get();
            //dd(json_decode(json_encode($detallesnotasventas)));
            foreach ($detallesnotascompras as $detalle) {
                $obtener_tallaproducto_de_db = Tallaproducto::find($detalle->idtallaproducto);
                $obtener_tallaproducto_de_db->stock = $obtener_tallaproducto_de_db->stock - $detalle->cantidad;
                $obtener_tallaproducto_de_db->update();
            }
            
            DB::commit();
            return  response()->json(['mensaje' => 'Producto quitado...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
