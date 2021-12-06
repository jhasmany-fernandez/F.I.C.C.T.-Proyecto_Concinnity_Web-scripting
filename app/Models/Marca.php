<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'marca';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function producto()
    {
        return $this->hasMany('App\Models\Producto','idproducto','id');
    }

    public static function store(Request $request){
        $marca = new Marca();
        $marca->nombre = $request->nombre;
        $marca->save();
    }

    public static function actualizar(Request $request){
        $marca = Marca::findOrFail($request->id);
        $marca->nombre = $request->nombre;
        $marca->update();
    }
}
