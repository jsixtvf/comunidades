<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\JuntaRequest;
use App\Models\Junta;

class JuntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $msj = '';
    private $tipos = ['ordinaria', 'extraordinaria'];
    
    public function index()
    {
        
        $this->user = auth()->user();
        $comunidad = session()->get('activeCommunity');
        $comunidad_activa = session()->get('activeCommunity');
        $juntas = $comunidad_activa->juntas;
        //$juntas = Junta::all();
        //dd($comunidad->juntas);
        return view('juntas.index', [
            'user' => $this->user,
           // 'comunidades' => $this->user->comunidades,
           // 'comunidad_activa' => $comunidad,
            'juntas' => $juntas,
            'btnText1' => 'New', 
            'btnText2' => 'Cancel', 
            'btndisabled' => ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = ['ordinaria', 'extraordinaria'];
        
        return view('juntas.create', [
            'junta' => new Junta, 
            'title' => 'New Junta',
            'tipos' => $this->tipos,
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
    public function store(JuntaRequest $request)
    {
        
        $this->msj = 'La junta fué creada con éxito';
        
        $request->merge([
            'user_id' => auth()->user()->id,
            'comunidad_id' => 1
        ]);

        Junta::create($request->validated());
        
        return redirect()->route('juntas.index')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Junta $junta)
    {
        return view('juntas.alt_show', [
            'junta' => $junta,
            'tipos' => $this->tipos,
            'btnText1' => 'Show', 
            'btnText2' => 'Back', 
            'btndisabled' => 'd-none'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Junta $junta)
    {
        return view('juntas.edit', [
            'junta' => $junta,
            'tipos' => $this->tipos,
            'title' => 'Edit junta',
            'btnText1' => 'Update', 
            'btnText2' => 'Cancel',
            'btndisabled' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Junta $junta, JuntaRequest $request)
    {
        $this->msj = 'La Junta fué actualizada con éxito';
        
        $junta->update($request->validated());

        return redirect()->route('juntas.show', $junta)->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Junta $junta, Request $request)
    {
        $this->msj = 'La junta fué eliminada con éxito';
        
        Junta::where('id', '=', $junta->id)->delete();
        
        $junta->delete();

        return redirect()->route('juntas.index', $junta)->with('status', [$this->msj, 'alert-danger']);
    }
}
