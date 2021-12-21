<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Notasalida extends Model
{
    use HasFactory;
    protected $table = 'notasalida';
    protected $fillable = ['pérdida_total', 'descripcion','condicion','created_at'];
    public $timestamps = true;

    public static function store(Request $request){
        if(count(json_decode($request->detalles)) == 0){
            return "Es necesario ingresar algunos detalles";
        }
        $notasalida = new Notasalida();
        $notasalida->pérdida_total = 0;
        $notasalida->descripcion = $request->descripcion;
        $notasalida->save();
        // dd(json_decode($request->detalles));
        $total_de_detalles = 0;
        foreach (json_decode($request->detalles) as $detalle) {
            $obtener_tallaproducto_de_db = Tallaproducto::find($detalle->id);
            if($detalle->cantidad > $obtener_tallaproducto_de_db->stock){
                return "No hay suficiente stock del producto " . $obtener_tallaproducto_de_db->producto->nombre . " " . $obtener_tallaproducto_de_db->talla->nombre ;
            }

            $detallenotasalida = new Detallenotasalida();
            $detallenotasalida->precio = $detalle->precio;
            $detallenotasalida->cantidad = $detalle->cantidad;
            
            $obtener_tallaproducto_de_db->stock = $obtener_tallaproducto_de_db->stock - $detalle->cantidad;
            $obtener_tallaproducto_de_db->update();

            $productos = Producto::find($obtener_tallaproducto_de_db->idproducto); 

            $detallenotasalida->total = $detalle->total;
            $detallenotasalida->idtallaproducto = $detalle->id;
            $detallenotasalida->idnotasalida = $notasalida->id;
            $detallenotasalida->save();
            $total_de_detalles = $total_de_detalles + ($detalle->total - $detalle->total*$productos->oferta);
        }

        $notasalidaactualizado = Notasalida::find($notasalida->id);
        $notasalidaactualizado->pérdida_total = $total_de_detalles;
        $notasalidaactualizado->update();

        return '';
    }
}
