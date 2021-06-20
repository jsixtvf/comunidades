<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\DB;
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

        $this->activeCommunity = session()->get('activeCommunity');
       
    }

    public function index()
    {
       // return view("propietario");
        $usuarios = User::latest()->paginate(5);
    
        return view('usuarios.index',compact('usuarios'))
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
    public function store(UsuariosRequest $request)
    {
         
      /*DB::table('propietarios')->insert([
            'Tratamiento'=>$request->Tratamiento,
            'Nombre'=>$request->Nombre,
            'Apellido1'=>$request->Apellido1,
            'Apellido2'=>$request->Apellido2,
            'Tipo'=>$request->Tipo,
            'Fecha'=>$request->Fecha,
            'DNI'=>$request->DNI,
            'Email'=>$request->Email,
            'Telefono'=>$request->Telefono,
            'Calle'=>$request->Calle,
            'Portal'=>$request->Portal,
            'Bloque'=>$request->Bloque,
            'Escalera'=>$request->Escalera,
            'Piso'=>$request->Piso,
            'Puerta'=>$request->Puerta,
            'Codigo_pais'=>$request->Codigo_pais,
            'CP'=>$request->CP,
            'Pais'=>$request->Pais,
            'Provincia'=>$request->Provincia,
            'Localidad' => $request->Localidad,
            'created_at' => now(),
            'updated_at' => now(),
        ]);*/

  DB::table('users')->insert([
            'Tratamiento'=>$request->Tratamiento,
            'name'=>$request->name,
            'Apellido1'=>$request->Apellido1,
            'Apellido2'=>$request->Apellido2,
            'password'=>$request->password,
            'Tipo'=>$request->Tipo, 
            'Fecha'=>$request->Fecha,
            'DNI'=>$request->DNI,
            'email'=>$request->email,
            'Telefono'=>$request->Telefono,
            'Calle'=>$request->Calle,
            'Portal'=>$request->Portal,
            'Bloque'=>$request->Bloque,
            'Escalera'=>$request->Escalera,
            'Piso'=>$request->Piso,
            'Puerta'=>$request->Puerta,
            'Codigo_pais'=>$request->Codigo_pais,
            'CP'=>$request->CP,
            'Pais'=>$request->Pais,
            'Provincia'=>$request->Provincia,
            'Localidad' => $request->Localidad,
            'limitMaxFreeCommunities'=> 2,
            'comunidad_id' => session()->get('activeCommunity')->id
        ]);


        return $request;
        
      
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('usuarios.edit',compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
          $request->validate([
            'name'=>'required',
            'apellido1'=>'required',
               
        ]);
    
        $usuarios->update($request->all());
    
        return redirect()->route('usuarios.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuarios->delete();
    
        return redirect()->route('usuarios.index')
                        ->with('success','User deleted successfully');
    }
}
