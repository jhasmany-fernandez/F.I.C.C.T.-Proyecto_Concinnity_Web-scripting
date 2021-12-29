<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DetalleNotaVenta as ControllersDetalleNotaVenta;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Notaventa;
use App\Models\Detallenotaventa;
use App\Models\Tallaproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NotaventaExport;

class NotaVentaController extends Controller
{
    public function index(){
        $notasventas = Notaventa::with('cliente')->with('user')->paginate(4);
        // dd(json_decode(json_encode($notasventas)));
        return view('notaventa.index', ['notasventas' => $notasventas]);
    }

    public function index_reporte(){
        $notasventas = Notaventa::with('cliente')->with('user')->paginate(4);
        // dd(json_decode(json_encode($notasventas)));
        return view('reportendv.index', ['notasventas' => $notasventas]);
    }

    public function create(){
        $tallasproductos = Tallaproducto::where('condicion', 1)->where('stock', '>', 0)->with('producto')->with('talla')->get();
        //$tallasproductos = Tallaproducto::join('producto', 'tallaproducto.idproducto', 'producto.id')->where('tallaproducto.condicion', 1)->where('producto.condicion', 1)->with('talla')->get();
        // dd(json_decode(json_encode($tallasproductos)));
        $clientes = Cliente::get();
        return view('notaventa.create', ['clientes' => $clientes, 'tallasproductos' => $tallasproductos]);
    }

    public function busqueda(Request $request){
        try {
            if($request->input('opcion') == 'cliente'){
                $notasventas = Notaventa::join('cliente', 'notaventa.idcliente', 'cliente.id')->where('cliente.nombre', 'LIKE', '%'.$request->input('texto').'%')->get();
                $ids_clientes = array();
                foreach ($notasventas as $value) {
                    array_push($ids_clientes, $value->idcliente);
                }

                $notasventas = Notaventa::whereIn('idcliente', $ids_clientes)->with('cliente')->with('user')
                ->paginate(4);

                $view = view('notaventa.datos', compact('notasventas'))->render();
                return response()->json(['view' => $view], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function busqueda_reporte(Request $request){
        try {
            if($request->input('opcion') == 'cliente'){
                if($request->input('texto') == ''){
                    $notasventas = Notaventa::join('cliente', 'notaventa.idcliente', 'cliente.id')->where('cliente.nombre', 'LIKE', '%'.$request->input('texto').'%')->get();
                    $ids_clientes = array();
                    foreach ($notasventas as $value) {
                        array_push($ids_clientes, $value->idcliente);
                    }

                    $notasventas = Notaventa::whereIn('idcliente', $ids_clientes)->with('cliente')->with('user')
                    ->paginate(4);

                    $view = view('reportendv.datos', compact('notasventas'))->render();
                    return response()->json(['view' => $view], 200);
                }else{
                    $notasventas = Notaventa::join('cliente', 'notaventa.idcliente', 'cliente.id')->where('cliente.nombre', 'LIKE', '%'.$request->input('texto').'%')->get();
                    $ids_clientes = array();
                    foreach ($notasventas as $value) {
                        array_push($ids_clientes, $value->idcliente);
                    }

                    $notasventas = Notaventa::whereIn('idcliente', $ids_clientes)->whereBetween('created_at', [$request->desde, $request->hasta])->with('cliente')->with('user')
                    ->paginate(4);

                    //dd(json_decode(json_encode($notasventas)));

                    $view = view('reportendv.datos', compact('notasventas'))->render();
                    return response()->json(['view' => $view], 200);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $errores = Notaventa::store($request);
            if($errores != ''){
                DB::rollBack();
                return response()->json(['mensaje' => $errores], 500);
            }
            DB::commit();
            return response()->json(['mensaje' => 'Nota de venta creada exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    //ver en el detalle de la nota de venta
    public function ver($idnotaventa){
        $detallesnotasventas = Detallenotaventa::where('idnotaventa', $idnotaventa)->with('tallaproducto')->get();
        // dd(json_decode(json_encode($detallesnotasventas)));
        $clientes = Cliente::get();
        $notasventas = Notaventa::find($idnotaventa);
        return view('notaventa.ver', ['clientes' => $clientes, 'detallesnotasventas' => $detallesnotasventas, 'notasventas' => $notasventas]);
    }

    public function ver_reporte($idnotaventa){
        $detallesnotasventas = Detallenotaventa::where('idnotaventa', $idnotaventa)->with('tallaproducto')->get();
        // dd(json_decode(json_encode($detallesnotasventas)));
        $clientes = Cliente::get();
        $notasventas = Notaventa::find($idnotaventa);
        return view('reportendv.ver', ['clientes' => $clientes, 'detallesnotasventas' => $detallesnotasventas, 'notasventas' => $notasventas]);
    }

    public function desactivar(Request $request){
        try {
            DB::beginTransaction();
            $notaventa = Notaventa::findOrFail($request->input('id'));
            $notaventa->condicion = 0;
            $notaventa->update();
            
            $notasventas = Notaventa::find($notaventa->id);
            $detallesnotasventas = Detallenotaventa::where('idnotaventa', $notasventas->id)->get();
            //dd(json_decode(json_encode($detallesnotasventas)));
            foreach ($detallesnotasventas as $detalle) {
                $obtener_tallaproducto_de_db = Tallaproducto::find($detalle->idtallaproducto);
                $obtener_tallaproducto_de_db->stock = $obtener_tallaproducto_de_db->stock + $detalle->cantidad;
                $obtener_tallaproducto_de_db->update();
            }
            
            $bitacora = new Bitacora();
            $bitacora->accion = 'Desactivar';
            $bitacora->tabla = 'Nota de venta';
            $bitacora->idusuario = Auth::user()->id;
            $bitacora->save();

            DB::commit();
            return  response()->json(['mensaje' => 'Producto devuelto...'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }

    public function pdf($idnotaventa){
        $notaventa = Notaventa::with('cliente')->with('user')
        ->where('notaventa.id',$idnotaventa)->first();
        // dd(json_decode(json_encode($notasventas)));
        $detallesnotasventas= Detallenotaventa::with('tallaproducto')->where('detallenotaventa.idnotaventa', $idnotaventa)->orderBy('detallenotaventa.id','desc')->get();
        //dd(json_decode(json_encode($detallesnotasventas)));
        $pdf = PDF::loadView('pdf.recibocompra',['notaventa' => $notaventa, 'detallesnotasventas' => $detallesnotasventas]);
        return $pdf->download('venta-'.$notaventa->id.'.pdf');
    }

    public function excel($year){
        //return Excel::download(new NotaventaExport, 'lista_notaventa.xlsx');
        return (new NotaventaExport)->forYear($year)->download('lista_notaventa_'.$year.'.xlsx');
    }

}
