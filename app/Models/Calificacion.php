<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Calificacion extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'calificaciones';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombreCalificacion'
    ];
    
    public function proveedores() {
        return $this->hasMany(Proveedor::class, 'nombreCalificacion', 'id')->withTimestamps();
    }
}
