<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Figura extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'figuras';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'figura'
    ];
}
