<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    //protected ComunidadSeleccionada = null;
    
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        "remember_token",
        "tratamiento",
        "apellido1",
        "apellido2",
        //"tipo",
        "fecha",
        "dni",
        "telefono",
        "calle",
        "portal",
        "bloque",
        "escalera",
        "piso",
        "puerta",
        "codigo_pais",
        "cp",
        "pais",
        "provincia",
        "localidad"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $table = 'users';
    
    protected $role = ['super', 'admin', 'user'];
    
    protected $permissions = ['read','create', 'edit', 'delete'];

    
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function comunidades() {
        return $this->belongsToMany(Comunidad::class, 'comunidad_user','user_id','comunidad_id')->withTimestamps();
    }

    public function propiedades(){
        return $this->hasMany(Propiedad::class);
    }

    public function role($user_id){

        //metodo a incluir en el modelo User, obtenemos una query del rol de cada usuario en la comunidad.

        //Recuperamos de la sesion y el middleware, el id de la comunidad y el id de usuario, respectivamente.
        $comunidad_id = session()->get('activeCommunity')->id;

        return  $role_id = User::join('comunidad_user', 'users.id', '=', 'comunidad_user.user_id')
        ->where('user_id', '=', $user_id)->where('comunidad_user.comunidad_id', '=', $comunidad_id)
        ->get()->pluck('role_id')->last();
    }
    
    /*public function roles() {
        return $this->belongsToMany(Role::class, 'comunidad_user','user_id','role_id')->withTimestamps();
    }*/

}
