<?php

namespace App\Http\Controllers;

use App\Models\movimientos;
use App\Models\cuentasBancarias;
use App\Models\distribucion_gastos;
use App\Models\ingresos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\StoreMovimientosRequest;
use App\Models\Propiedades_User;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movimientos = movimientos::orderBy('id')->get();
        $ingresos = ingresos::sum('cantidad');

       //$total = movimientos::sum('cantidad') ;
        $total = movimientos::where('concepto', '!=','ingreso')->sum('cantidad');
        
        //dd($total);
    
        return view('movimientos/movimientos',['movimientos' => $movimientos,'total' => $total,'ingresos' => $ingresos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $movimientos = cuentasBancarias::all();
        $propiedades = Propiedades_User::all();
        $grupos = distribucion_gastos::distinct('nombre')->get();


        return view('movimientos/movimiento',['movimientos' => $movimientos,'grupos' => $grupos,'propiedades' =>$propiedades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovimientosRequest $request)
    {
        
        movimientos::create($request->all());
        return redirect() -> route('movimientos.index') -> with('mensaje','se ha creado el movimiento exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function show(movimientos $movimientos,$id)
    {
        //
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(movimientos $movimientos,$id)
    {
        //
        $grupos = distribucion_gastos::distinct('nombre')->get();
        $movimiento = movimientos::where('concepto','!=','ingreso')->findOrFail($id);
        return view('movimientos/editarMovimientos',compact('movimiento','grupos'));
        //return $movimiento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movimientos $movimientos,$id)
    {
        //

        $movimiento = movimientos::findOrFail($id);
        $movimiento->distribucion = $request->distribucion;
        $movimiento->fechaValor = $request->fechaValor;
        $movimiento->concepto = $request->concepto;
        $movimiento->cantidad = $request->cantidad;
        $movimiento->distribucion = $request->distribucion;
        $movimiento->observaciones = $request->observaciones;
        $movimiento->save();

        
        return redirect()->route('movimientos.index')->with('Se ha actualizado exitasamente');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(movimientos $movimientos,$id)
    {
        //
        movimientos::findOrFail($id)->delete();
        return redirect()->route('movimientos.index')->with('mensaje','Se ha elimino correctamente');
    }
}
