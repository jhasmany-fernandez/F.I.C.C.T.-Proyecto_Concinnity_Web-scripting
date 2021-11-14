<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email', 'password','idpersonal','idrol','imagen'
    ];

    protected $hidden = [
        'password','remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function personal(){
        return $this->belongsTo('App\Models\Personal','idpersonal','id');
    }

    public function rol(){
        return $this->belongsTo('App\Models\Rol','idrol','id');
    }

    public static function store(Request $request){
        $personal = new Personal();
        $personal->ci = $request->ci;
        $personal->nombre = $request->nombre;
        $personal->sexo = $request->sexo;
        $personal->telefono = $request->telefono;
        $personal->direccion = $request->direccion;
        $personal->save();

        $user = new User();
        $user->idpersonal = $personal->id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->hasFile('imagen')){
            $extension = $request->imagen->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('users', $request->imagen, $nombre);
                $path = 'users/' . $nombre;
                $user->imagen = $path;
            }
        }
        $user->idrol = $request->idrol;
        $user->save();
    }

    public static function actualizar(Request $request){
        $user = User::findOrFail($request->id);
        $user->email = $request->email;
        if($request->hasFile('imagen')){
            if($user->imagen){
                Storage::disk('public')->delete($user->imagen);
            }
            $extension = $request->imagen->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('users', $request->imagen, $nombre);
                $path = 'users/' . $nombre;
                $user->imagen = $path;
            }
        }
        $user->idrol = $request->idrol;
        $user->update();

        $personal = Personal::findOrFail($user->idpersonal);
        $personal->ci = $request->ci;
        $personal->nombre = $request->nombre;
        $personal->sexo = $request->sexo;
        $personal->telefono = $request->telefono;
        $personal->direccion = $request->direccion;
        $personal->update();
    }
}
