<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidades';
    protected $dates = ['deleted_at'];   // registramos la nueva columna ¿necesario en laravel 8?
    protected $fillable = [
        'cif',
        'fechalta',
        'activa',
        'gratuita',
        'partes',
        'denom',
        'direccion',
        'localidad',
        'provincia',
        'cp',
        'pais',
        'logo',
        'observaciones',
        'limitMaxFree'
    ];

    public function propiedades() {
        return $this->hasMany(Propiedad::class);
    }

    public function cuentas() {
        return $this->hasMany(Cuenta::class);
    }
    
    public function comunidades_user() {
        return $this->hasMany(Comunidad_User::class);
    }

    /* public function propietarios() {
        return $this->hasMany(Propietario::class);
    }*/

    public function usuarios() {
        return $this->belongsToMany(User::class, 'comunidad_user','comunidad_id','user_id')->withTimestamps();
    }
    
    public function proveedor() {
        return $this->belongsToMany(Proveedor::class, 'comunidades_proveedores', 'comunidad_id', 'proveedor_id')->withTimestamps();
    }

  /*  public function roles() {

        return $this->belongsToMany(Role::class, 'comunidad_user', 'comunidad_id', 'role_id');
        return $this->belongsToMany(Comunidad_User::class, 'comunidad_user', 'comunidad_id', 'role_id')->withTimestamps();
    }*/

    public function nombreRole($id){
        return $nombreTipo = Role::join('comunidad_user', 'roles.id', '=', 'comunidad_user.role_id')->where('comunidad_user.comunidad_id', '=', $id)->where('comunidad_user.user_id', '=', auth()->user()->id)->get()->pluck('role')->last();
    }

    public function paises() {
        return $this->belongsTo(Pais::class, 'id', 'pais')->withTimestamps();
    }

    public function nombrePais($id){
        // $nombre_tipo = Tipo::findOrFail($id, ['nombreTipo']); 
        //$users = User::join('posts', 'users.id', '=', 'posts.user_id') ->get(['users.*', 'posts.descrption']);
        return $nombrePais = Comunidad::join('paises', 'comunidades.pais', '=', 'paises.id')->where('comunidades.id', '=', $id)->get()->pluck('nombrePais')->last();
    }

    public function juntas() {
        return $this->hasMany(Junta::class);
    }

}
