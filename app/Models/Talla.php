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

    public static function store(Request $request){
        $talla = new Talla();
        $talla->nombre = $request->nombre;
        $talla->save();
    }

    public static function actualizar(Request $request){
        $talla = Talla::findOrFail($request->id);
        $talla->nombre = $request->nombre;
        $talla->update();
    }
}
