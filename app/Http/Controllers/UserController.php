<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comunidad_User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use App\Models\Propietario;
//use App\Http\Requests\PropietariosRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {

       // $this->activeCommunity = session()->get('activeCommunity');
       
    }

    public function index()
    {   // return view("propietario"); //$usuarios = session()->get('activeCommunity')->usuarios;
        // User::latest()->paginate(10);
        $comunidad_activa = session()->get('activeCommunity');
        $usuarios = User::join('comunidad_user', 'comunidad_user.user_id', '=', 'users.id')
            ->where('comunidad_user.comunidad_id','=', $comunidad_activa->id)
            ->where('comunidad_user.role_id','=', 3)->get(); 
             
        return view('usuarios.index',
            //compact('usuarios')
            [
            'usuarios' => $usuarios,
            'activeCommunity' => $comunidad_activa
            ]
         )
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->msj = 'Se ha creado el usuario';

        $request->replace(['password' => Hash::make( $request->password )] ); // aplicar hash al password
        
        //dd($request->get('password'));
        
        User::create($request->validated());

        $new_user = User::latest('created_at')->first();
        
        $comunidad_activa = session()->get('activeCommunity');

        Comunidad_User::create([
            'comunidad_id' => $comunidad_activa->id,
            'user_id' => $new_user->id,
            'role_id' => '3',
            'created_at' => $new_user->created_at,
            'updated_at' => $new_user->updated_at
        ]);

       // session()->put('activeCommunity', null);
       // session()->put('activeCommunity', $comunidad_activa);

        return redirect()->route('usuarios.index')->with('status', [$this->msj, 'alert-success']);

       // return $request;
        /* DB::table('users')->insert([
        'tratamiento'=>$request->Tratamiento, 'name'=>$request->name, 'apellido1'=>$request->Apellido1,
        'apellido2'=>$request->Apellido2, 'password'=>$request->password, 'tipo'=>$request->Tipo, 'fecha'=>$request->Fecha,
        'dni'=>$request->dni, 'email'=>$request->email, 'telefono'=>$request->Telefono, 'calle'=>$request->Calle,
        'portal'=>$request->Portal, 'bloque'=>$request->Bloque, 'escalera'=>$request->Escalera,
        'piso'=>$request->Piso, 'puerta'=>$request->Puerta, 'codigo_pais'=>$request->Codigo_pais,'cp'=>$request->CP,
        'pais'=>$request->Pais,'provincia'=>$request->Provincia, 'localidad' => $request->Localidad,
        //'limitMaxFreeCommunities'=> 2, //'comunidad_id' => session()->get('activeCommunity')->id
        ]);*/

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        //
        return view('usuarios.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        //

        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $usuario)
    {
        //
    /*      $request->validate([
            'name'=>'required',
            'apellido1'=>'required',
               
        ]);*/
    
        $usuario->update($request->validated());
    
        return redirect()->route('usuarios.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        //
        $usuario->delete();
    
        return redirect()->route('usuarios.index')
                        ->with('success','User deleted successfully');
    }
}
