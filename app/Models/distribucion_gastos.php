<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class distribucion_gastos extends Model
{
    use HasFactory;

    protected $table = 'distribucion_gastos';


    protected $fillable = [
        //'propietario',
        'propiedad',
        'coeficiente',
        'unidadRegistral',
        'nombre',
        'abreviatura',
        'orden'
    ];



    public function propietarios(){
        return $this-> hasMany(Propiedades_User::class);
    }

    public function lista(){
        return $this -> hasMany(listaDistribucion::class);

    }

    public function movimientos(){
        return $this -> belongsTo(movimientos::class);
    }
    
}