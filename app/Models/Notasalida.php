<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Notasalida extends Model
{
    use HasFactory;
    protected $table = 'notasalida';
    protected $fillable = ['descripcion','condicion','created_at'];
    public $timestamps = true;

    public static function store(Request $request){
        if(count(json_decode($request->detalles)) == 0){
            return "Es necesario ingresar algunos detalles";
        }
        $notasalida = new Notasalida();
        $notasalida->descripcion = $request->descripcion;
        $notasalida->save();
        // dd(json_decode($request->detalles));
        foreach (json_decode($request->detalles) as $detalle) {
            $obtener_tallaproducto_de_db = Tallaproducto::find($detalle->id);
            if($detalle->cantidad > $obtener_tallaproducto_de_db->stock){
                return "No hay suficiente stock del producto " . $obtener_tallaproducto_de_db->producto->nombre . " " . $obtener_tallaproducto_de_db->talla->nombre ;
            }

            $detallenotasalida = new Detallenotasalida();
            $detallenotasalida->cantidad = $detalle->cantidad;
            
            $obtener_tallaproducto_de_db->stock = $obtener_tallaproducto_de_db->stock - $detalle->cantidad;
            $obtener_tallaproducto_de_db->update();

            $productos = Producto::find($obtener_tallaproducto_de_db->idproducto); 

            $detallenotasalida->idtallaproducto = $detalle->id;
            $detallenotasalida->idnotasalida = $notasalida->id;
            $detallenotasalida->save();
        }
        return '';
    }
}
