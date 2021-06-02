<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Proveedor;
use App\Http\Requests\SaveProveedorRequest;
use App\Models\Comunidad_Proveedor;
use App\Models\Tipo;

class ProveedorController extends Controller {

    //
    private $msj = '';
    private $activeCommunity;
    private $tipos = Tipo::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->tipos = Tipo::all();
        
        return view('proveedores.create', [
            'proveedor' => new Proveedor,
            'tipos' => $this->tipos
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
        
        $comunidad = session()->get('activeCommunity');

        $new_proveedor = Proveedor::create($request->validated());
        $new_proveedor = Proveedor::orderBy('created_at', 'desc')->first();
        
        Comunidad_Proveedor::create([
            'comunidad_id' => $comunidad->id,
            'proveedor_id' => $new_proveedor->id,
            'created_at' => $new_proveedor->created_at,
            'updated_at' => $new_proveedor->updated_at
        ]);

       return redirect()->route('proveedores.pasarComunidad', $comunidad)->with('status', [$this->msj, 'alert-primary']);
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
        
        $this->tipos = Tipo::all();
        
        return view('proveedores.edit', [
            'proveedor' => $proveedor,
            'tipos' => $this->tipos
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

        return redirect()->route('proveedores.pasarComunidad', $proveedor)->with('status', [$this->msj, 'alert-danger']);
    }

    public function select(Proveedor $proveedor) {

        $this->msj = "Has seleccionado el proveedor ";

        return $this->msj . $proveedor;
    }

    public function pasarComunidad(Comunidad $comunidad) {

        session()->put('activeCommunity', $comunidad);

        return view('proveedores.index', [// llamamos al Modelo
            'activeCommunity' => session()->get('activeCommunity')
        ]);
    }

}
