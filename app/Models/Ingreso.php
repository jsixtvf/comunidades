<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    use SoftDeletes;
  
    protected $table = 'ingresos';

    protected $fillable = [
        'fecha',
        'cantidad',
        'cuenta',
        'Propietario',
        
    ];

    public function cuenta(){
        return $this->belongsTo(CuentasBancarias::class);
    }

    public function ingresos(){
        return $this->hasMany(Propietario::class);
    }

}
