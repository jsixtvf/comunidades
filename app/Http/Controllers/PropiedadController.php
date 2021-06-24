<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\Propiedad;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PropiedadRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PropiedadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $usuarios = User::class;
     private $comunidades = Comunidad::class;


     public function __construct() {

        $this->usuarios = User::all();
        //$this->comunidades = Comunidad::all();
        $this->activeCommunity = session()->get('activeCommunity');
       
    }

    public function index() {

        $propiedades = Propiedad::latest()->paginate(5);
        $usuario = auth()->user();
        return view('propiedades.index', compact('propiedades'))
                        ->with('i', (request()->input('page', 1) - 1) * 5)->with('usuario',$usuario);
    }

    public function create() {

        
        return view("propiedades.create", [
            'propiedad' => new Propiedad,
            'usuarios' => session()->get('activeCommunity')->usuarios,
            'usuario' => auth()->user()

            //'comunidades' => $this->comunidades
        ] );
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropiedadRequest $request) {


        $comunidad_id = $request->get('comunidad_id');
        //dd($comunidad_id);
        $user_id = $request->get('user_id');
        //dd($user_id);
        $request->request->add( ['comunidad_id' => gmp_intval(gmp_init($comunidad_id ))] );
        $request->request->add( ['user_id' => gmp_intval(gmp_init($user_id ))] );
       
        //dd(gettype($request->comunidad_id)); dd($request->validated()); dd($request);

        Propiedad::create( $request->validated() );

      /*
        $request->request->add(['user_id' => $user_id]); ( esta opcion, si se hace aqui la validacion,
        no en PropiedadRequest )

        DB::table('propiedades')->insert([
            'nombre' => $request->nombre, 'propietario_id' => $request->propietario,
            'tipo' => $request->tipo, 'coeficiente' => $request->coeficiente,
            'parte' => $request->parte, 'observaciones' => $request->observaciones,
        ]);*/

        return redirect()->route('propiedades.index')
                        ->with('success', 'Propiedad creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad) {

    $tipos = ['local', 'piso','atico'];
        return view('propiedades.show', [
            'propiedad' => $propiedad,
            'tipos' => $tipos,
            'usuario' => auth()->user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad) {
        
    $tipos = ['local', 'piso','atico'];
        return view('propiedades.edit', [
            'propiedad' => $propiedad,
            'tipos' => $tipos,
            'usuarios' => session()->get('activeCommunity')->usuarios,
            'usuario' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(PropiedadRequest $request, Propiedad $propiedad) {

        /* Ejemplo de casteo a bigint
        $str = "99999977706";
        $bigInt = gmp_init($str);
        $bigIntVal = gmp_intval($bigInt);
        */
        //$numero = 29;

        /* Problema con las variables comunidad_id y user_id, llegan sus valores obtenidos por request
        pero no llegan a validarse */


        $propiedad->update($request->validated()); //$request->all()

        return redirect()->route('propiedades.index')
                        ->with('success', 'Propiedad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad) {

        $propiedad->delete();

        return redirect()->route('propiedades.index')
                        ->with('success', 'Propiedad borrada');
    }
      
}
