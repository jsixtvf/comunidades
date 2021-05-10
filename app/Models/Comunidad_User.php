<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad_User extends Model {

    use HasFactory;

    protected $table = 'comunidad_user';

    protected $fillable = [
        'comunidad_id',
        'user_id',
        'role_id'
    ]; 
}
