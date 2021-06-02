<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'proveedores';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'fechalta',
        'cif',
        'tipo',
        'calificacion',
        'figura',
        'nombre',
        'apellido1',
        'apellido2',
        'email',
        'telefono',
        'calle',
        'portal',
        'bloque',
        'escalera',
        'piso',
        'puerta',
        'codigopais',
        'cp',
        'pais',
        'provincia',
        'localidad',
        'iban'
    ];

    public function comunidades() {
        return $this->belongsToMany(Comunidad::class, 'comunidades_proveedores', 'proveedor_id', 'comunidad_id')->withTimestamps();
    }
    
    public function tipos() {
        return $this->belongsTo(Tipo::class, 'id', 'tipo')->withTimestamps();
    }
    
    public function calificaciones() {
        return $this->belongsTo(Calificacion::class, 'id', 'calificacion')->withTimestamps();
    }
    
    public function figuras() {
        return $this->belongsTo(Figura::class, 'id', 'figura')->withTimestamps();
    }
}
