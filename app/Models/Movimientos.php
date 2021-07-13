<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model {

    use HasFactory;

    protected $table = 'movimientos';
    protected $fillable = [
        'fechaAlta',
        'cuenta',
        'distribucion',
        'grupo',
        'fechaValor',
        'concepto',
        'cantidad',
        'iva',
        'observaciones',
        'propiedad'
    ];

    public function cuenta() {
        return $this->belongsTo(CuentasBancarias::class);
    }

    public function distribucion() {
        return $this->hasOne(DistribucionGastos::class);
    }

    public function propiedades() {
        return $this->hasMany(Propiedades_User::class);
    }

}
