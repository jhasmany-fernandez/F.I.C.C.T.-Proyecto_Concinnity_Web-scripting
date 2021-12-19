<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Material extends Model
{
    use HasFactory;
    protected $table = 'material';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function producto()
    {
        return $this->hasMany('App\Models\Producto','idmaterial','id');
    }

    public static function store(Request $request){
        $material = new Material();
        $material->nombre = $request->nombre;
        $material->save();
    }

    public static function actualizar(Request $request){
        $material = Material::findOrFail($request->id);
        $material->nombre = $request->nombre;
        $material->update();
    }
}
