<?php

namespace App\Http\Controllers;

use App\Models\ingresos;
use App\Models\cuentasBancarias;
use App\Models\movimientos;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use  App\Http\Requests\ingreso;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $ingresos = ingresos::all();
        $total = ingresos::sum('cantidad');
        return view('ingresos/ingresos',['ingresos' => $ingresos,'total' => $total]);
        */
        $ingresos = movimientos::where('concepto', '=', 'ingreso')->get();
        //dd($ingresos);
        return view('ingresos/ingresos', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $cuentas = cuentasBancarias::all();
        $propietarios = Propietario::all();
        //dd($cuenta->cuenta);
        $actual = Carbon::now();
        $fecha = $actual -> format('d-m-Y');

        return view('ingresos/ingreso',['cuentas' => $cuentas,'fecha' => $fecha,'propietarios' => $propietarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ingreso $request)
    {
        //
        ingresos::create($request->all());
        return redirect()->route('ingreso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function show(ingresos $ingresos)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function edit(ingresos $ingresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ingresos $ingresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ingresos $ingresos)
    {
        //
    }
}
