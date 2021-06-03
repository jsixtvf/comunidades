<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad_Proveedor extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table = 'comunidades_proveedores';
	protected $dates = ['deleted_at'];

	 protected $fillable = [
        'comunidad_id',
        'proveedor_id'
        
    ];
    
}