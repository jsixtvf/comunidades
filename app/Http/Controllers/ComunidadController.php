<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\User;
use \App\Models\Comunidad_User;
use App\Models\TeamUser;
use App\Models\Team;
use App\Http\Requests\SaveComunidadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ComunidadController extends Controller {

    private $msj = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        if (! $request->session()->has('activeCommunity')) {
            $request->session()->put('activeCommunity', null);
        }

        $user = auth()->user();
        
        return view('comunidades.index', [
            'user' => $user,
            'comunidades' => $user->comunidades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('comunidades.create', [
            'comunidad' => new Comunidad, 
            'title' => 'New Community', 
            'btnText1' => 'Save', 
            'btnText2' => 'Cancel', 
            'btndisabled' => ''
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveComunidadRequest $request) {

        $this->msj = 'La comunidad fué creada con éxito';

        $gratuita = true;
        
        $user = auth()->user();

        if (auth()->user()->comunidades->count() >= env('APP_LIMIT_MAX_FREE_COMMUNITIES')) {
            $gratuita = false;
        }

        $request->merge([
            'activa' => true,
            'gratuita' => $gratuita
        ]);

        Comunidad::create($request->validated());

        $new_comunidad = Comunidad::latest('created_at')->first();

        Comunidad_User::create([
            'comunidad_id' => $new_comunidad->id,
            'user_id' => $user->id,
            'role_id' => '2',
            'created_at' => $new_comunidad->created_at,
            'updated_at' => $new_comunidad->updated_at
        ]);

        return redirect()->route('comunidades.index')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $comunidad) {

        return view('comunidades.alt_show', [
            'comunidad' => $comunidad,
            'btnText1' => 'Show', 
            'btnText2' => 'Back', 
            'btndisabled' => 'disabled'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidad $comunidad) {
        //
        return view('comunidades.edit', [
            'comunidad' => $comunidad, 
            'title' => 'Edit Comunidad', 
            'btnText1' => 'Update', 
            'btnText2' => 'Cancel',
            'btndisabled' => ' '
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(Comunidad $comunidad, SaveComunidadRequest $request) {

        $this->msj = 'La comunidad fué actualizada con éxito';
        
        $comunidad->update($request->validated());

        return redirect()->route('comunidades.show', $comunidad)->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $comunidad, Request $request) {

        $comunidad->activa = false;

        $comunidad->update();

        $this->msj = 'La comunidad fué eliminada con éxito';

        $comunidad::latest('updated_at')->first();
        
        Comunidad_User::where('comunidad_id', '=', $comunidad->id)->delete();
        
        $request->session()->put('activeCommunity', null);
        
        $comunidad->delete();

        return redirect()->route('comunidades.index', $comunidad)->with('status', [$this->msj, 'alert-danger']);
    }

    public function select(Comunidad $comunidad, Request $request) {

        $this->msj = "Has seleccionado la comunidad ";
        $color = 'alert-success';
        
        if (! $request->session()->has('activeCommunity')) {
            $request->session()->put('activeCommunity', $comunidad);
        } else {
            $this->msj = "Has salido de la comunidad seleccionada";
            $color = 'alert-danger';
            $request->session()->put('activeCommunity', null);
        }
        
        
                
        return redirect()->route('dashboard', $comunidad)->with('status', [$this->msj, $color]);
    }

}
