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
        'tipo'
    ];
    
    public function proveedores() {
        return $this->hasMany(Proveedor::class, 'tipo', 'id')->withTimestamps();
    }
}
