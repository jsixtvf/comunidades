<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = "propiedades";
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        "nombre",
        "parte",
        "coeficiente",
        "tipo",
        "observaciones",
        "comunidad_id",
        "user_id"
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function nombreUser($id){
        $consulta = Propiedad::join('users', 'propiedades.user_id', '=', 'users.id')->where('users.id', '=', $id);
        $nombreUser = $consulta->pluck('users.name')->last();
        $apellidoUser = $consulta->pluck('users.apellido1')->last();
        $nombreApellidoUser = $nombreUser." ".$apellidoUser;
        return $nombreApellidoUser;
    }

}
