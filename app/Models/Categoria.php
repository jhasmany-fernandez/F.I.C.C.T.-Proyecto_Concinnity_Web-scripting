<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function producto()
    {
        return $this->hasMany('App\Models\Producto','idproducto','id');
    }

    public static function store(Request $request){
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();
    }

    public static function actualizar(Request $request){
        $categoria = Categoria::findOrFail($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->update();
    }
}
