<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'tipos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombreTipo'
    ];
    
    public function proveedores() {
        return $this->hasMany(Proveedor::class, 'nombreTipo', 'id')->withTimestamps();
    }

    public function nombreTipo($id){
         // $nombre_tipo = Tipo::findOrFail($id, ['nombreTipo']); 
        //$users = User::join('posts', 'users.id', '=', 'posts.user_id') ->get(['users.*', 'posts.descrption']);
        return $nombreTipo = Proveedor::join('tipos', 'tipos.id', '=', 'ti.id')
               ->get(['tipos.nombreTipo']);
    }


}
