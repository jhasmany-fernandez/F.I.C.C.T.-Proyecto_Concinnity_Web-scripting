<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permiso extends Model
{
    use HasFactory;
    protected $table = 'permiso';
    protected $fillable = ['nombre','condicion'];
    public $timestamps = false;

    public function rol_permiso()
    {
        return $this->hasMany('App\Models\Rol_permiso','idpermiso','id');
    }

    public static function store(Request $request){
        $permiso = new Permiso();
        $permiso->nombre = $request->nombre;
        $permiso->save();

        $roles = Rol::where('condicion', 1)->get();
        foreach ($roles as $rol) {
            $rol_permiso = new Rol_permiso(); 
            $rol_permiso->idpermiso = $permiso->id;
            $rol_permiso->idrol = $rol->id;
            $rol_permiso->save();
        }

        $bitacora = new Bitacora();
        $bitacora->accion = 'Registrar';
        $bitacora->tabla = 'Permiso';
        $bitacora->nombre_implicado = $request->nombre;
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->save();
    }

    public static function actualizar(Request $request){
        $permiso = Permiso::findOrFail($request->id);
        $permiso->nombre = $request->nombre;
        $permiso->update();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizar';
        $bitacora->tabla = 'Permiso';
        $bitacora->nombre_implicado = $request->nombre;
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->save();
    }
}
