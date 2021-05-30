<?php

namespace App\Http\Controllers;

use App\Models\cuentasBancarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCuentaBancariaRequest;

class CuentasBancariasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cuentasBancarias = cuentasBancarias::all();
        return view('cuentaBancaria/cuentaBancaria',['cuentasBancarias' => $cuentasBancarias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cuentaBancaria/cuentasBancarias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCuentaBancariaRequest $request)
    {
        //
        cuentasBancarias::create($request->all());
        return redirect('/cuentasBancarias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function show(cuentasBancarias $cuentasBancarias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function edit(cuentasBancarias $cuentasBancarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuentasBancarias $cuentasBancarias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuentasBancarias $cuentasBancarias)
    {
        //
    }
}
