<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Talla extends Model
{
    use HasFactory;
    protected $table = 'talla';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function tallaproducto()
    {
        return $this->hasMany('App\Models\Tallaproducto','idtalla','id');
    }

    public static function store(Request $request){
        $talla = new Talla();
        $talla->nombre = $request->nombre;
        $talla->save();

        $productos = Producto::where('condicion', 1)->get();
        foreach ($productos as $producto) {
            $tallaproducto = new Tallaproducto(); 
            $tallaproducto->idtalla = $talla->id;
            $tallaproducto->idproducto = $producto->id;
            $tallaproducto->stock = 0;
            $tallaproducto->save();
        }
    }

    public static function actualizar(Request $request){
        $talla = Talla::findOrFail($request->id);
        $talla->nombre = $request->nombre;
        $talla->update();
    }
}
