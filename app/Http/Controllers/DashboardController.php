<?php

namespace App\Http\Controllers;

use App\Models\Notaventa;
use App\Models\Producto;
use App\Models\Tallaproducto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::check()) {
            if(Auth::user()->idrol == 1)
            {
                // $notas_de_ventas_condicion_0 = Notaventa::where('notaventa.condicion', 1)
                // ->where(DB::raw("(DATE_FORMAT(created_at,'%a'))"), "Fri")->get();

                $date = Carbon::now()->subDays(7);

                $notas_de_ventas_devuelto = Notaventa::select(DB::raw("(DATE_FORMAT(created_at,'%a')) dia"), DB::raw('SUM(monto_total) as contadores'))->where('created_at', '>=', $date)->where('notaventa.condicion', 0)
                ->groupBy(DB::raw("(DATE_FORMAT(created_at,'%a'))"))->get();
                //dd(json_decode(json_encode($notas_de_ventas_devuelto)));

                $notas_de_ventas_registrado = Notaventa::select(DB::raw("(DATE_FORMAT(created_at,'%a')) dia"), DB::raw('SUM(monto_total) as contadores'))->where('created_at', '>=', $date)->where('notaventa.condicion', 1)
                ->groupBy(DB::raw("(DATE_FORMAT(created_at,'%a'))"))->get();

                $tallasproductos = Tallaproducto::where('condicion', 1)->where('stock', '<=', 10)->with('producto')->with('talla')->get();
                //dd(json_decode(json_encode($num_productos)));
                return view('dashboard.index_administrador', ['tallasproductos' => $tallasproductos], compact('notas_de_ventas_devuelto', 'notas_de_ventas_registrado'));
            }
            if(Auth::user()->idrol == 2)
            {
                $productos = Producto::where('condicion', 1)->where('oferta', '>', 0.00)->get();
                //dd(json_decode(json_encode($productos)));
                return view('dashboard.index_vendedor', ['productos' => $productos]);
            }
        }
    }
}
