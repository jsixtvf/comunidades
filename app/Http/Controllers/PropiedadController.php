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
            'usuarios' => session()->get('activeCommunity')->usuarios

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

        Propiedad::create($request->validated());

      /*  DB::table('propiedades')->insert([
            'nombre' => $request->nombre,
            'propietario_id' => $request->propietario,
            'tipo' => $request->tipo,
            'coeficiente' => $request->coeficiente,
            'parte' => $request->parte,
            'observaciones' => $request->observaciones,
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
            'tipos' => $tipos
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
            'usuarios' => $this->usuarios
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

        /*  $request->validate([
            'nombre' => 'required',
            'propietario_id' => 'required',
            'tipo' => ['required', 'in:local, piso, atico'],
            'coeficiente' => ['required'],
            'parte' => ['required'],
            'observacion' => ['max:100']
        ]);
        */

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
