<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $table = 'provincias';

    protected $dates = ['deleted_at'];

    public function comunidades() {
        return $this->hasMany(Comunidad::class, 'nombreProvincia', 'id')->withTimestamps();
    }
}