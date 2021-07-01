<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Proveedor;
use App\Http\Requests\SaveProveedorRequest;
use App\Models\Comunidad_Proveedor;
use App\Models\Tipo;
use App\Models\Calificacion;
use App\Models\Figura;

class ProveedorController extends Controller {

    //
    private $msj = '';
    private $activeCommunity = null;
    private $tipos = Tipo::class;
    private $calificaciones = Calificacion::class;
    private $figuras = Figura::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->tipos = Tipo::all();
        $this->calificaciones = Calificacion::all();
        $this->figuras = Figura::all();
        $this->activeCommunity = session()->get('activeCommunity');
    }
    
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        /* if ( !auth()->user()->hasTeamPermission(Team::find(auth()->user()->current_team_id), 'server:create')) {
          abort(401, 'You cannot see');
          } */
        
        //$this->tipos = Tipo::all()->pluck('tipo', 'id');
        
        return view('proveedores.create', [
            'proveedor' => new Proveedor,
            'tipos' => $this->tipos,
            'calificaciones' => $this->calificaciones,
            'figuras' => $this->figuras
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProveedorRequest $request) {

        $this->msj = 'El proveedor fué creado con éxito';
        
        $this->activeCommunity = session()->get('activeCommunity');

        $new_proveedor = Proveedor::create($request->validated());
        $new_proveedor = Proveedor::orderBy('created_at', 'desc')->first();
        
        Comunidad_Proveedor::create([
            'comunidad_id' => $this->activeCommunity->id,
            'proveedor_id' => $new_proveedor->id,
            'created_at' => $new_proveedor->created_at,
            'updated_at' => $new_proveedor->updated_at
        ]);

       return redirect()->route('proveedores.pasarComunidad', $this->activeCommunity)->with('status', [$this->msj, 'alert-primary']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor) {
        //
        return view('proveedores.show', [
            'proveedor' => $proveedor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor) {
        
        return view('proveedores.edit', [
            'proveedor' => $proveedor,
            'tipos' => $this->tipos,
            'calificaciones' => $this->calificaciones,
            'figuras' => $this->figuras
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Proveedor $proveedor, SaveProveedorRequest $request) {

        $this->msj = 'El proveedor fué actualizado con éxito';

        $proveedor->update($request->validated());

        return redirect()->route('proveedores.show', $proveedor)->with('status', [$this->msj, 'alert-primary']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor) {

        $this->msj = 'El proveedor fué eliminado con éxito';
        
        $proveedor->delete();

        return redirect()->route('proveedores.pasarComunidad', session()->get('activeCommunity'))->with('status', [$this->msj, 'alert-danger']);
    }

    public function select(Proveedor $proveedor) {

        $this->msj = "Has seleccionado el proveedor ";

        return $this->msj . $proveedor;
    }

    public function pasarComunidad(Comunidad $comunidad) {

        session()->put('activeCommunity', $comunidad);
        
        $this->activeCommunity = session()->get('activeCommunity');

        return view('proveedores.index', [// llamamos al Modelo
            'activeCommunity' => $this->activeCommunity
        ]);
    }

}