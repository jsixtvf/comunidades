<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\distribucion_gastos;
use App\Models\Propiedades_User;
use App\Models\movimientos;

class ListaMovimientosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //

        $prueba = array();
        $propiedad = request()->get('propiedad');
        $gastos = distribucion_gastos::where('propiedad', '=', $propiedad)->get(['coeficiente', 'unidadRegistral', 'nombre']);
        $totalPropiedades = Propiedades_User::count('propiedad');
        $dineroPropiedad = movimientos::where('propiedad', '=', $propiedad)->where('concepto', '=', 'ingreso')->get('cantidad')->sum('cantidad');
        $gastosPropiedad = 0;
        $total = 0;
        //array_push($array,$dineroPropiedad);
        $arrayIngresado['ingresado'] = $dineroPropiedad;
        //dd($dineroIngresado);



        foreach ($gastos as $gasto) {
            //echo $gasto['nombre'] . '<br>';
            //echo $gasto['nombre'];
            $concepto = movimientos::where('grupo', '=', $gasto['nombre'])->get(['concepto', 'cantidad']);
            //dd($concepto);
            //echo $concepto[0]['concepto'];
            //array_push($array,$concepto);
            // dd($array);
            //dd($array);
            //echo $concepto[0]['concepto'] . '<br>';

            if ($gasto['nombre'] == 'coeficiente') {
                //$coeficiente = $coeficientePorcentaje[0]['coeficiente'] / 100;
                $operacion = sprintf("%01.2f", ($gasto['coeficiente'] / 100) * $concepto[0]['cantidad']);
                //echo  sprintf("%01.2f",$operacion) . ' € de  ' . $concepto[0]['concepto'] . '<br>';
            } else {
                $operacion = sprintf("%01.2f", $concepto[0]['cantidad'] / $totalPropiedades);
                //dd($concepto);
                //dd($operacion);
                //echo   sprintf("%01.2f",$operacion) . ' € de ' . $concepto[0]['concepto'] .'<br>';
            }


            $restante = $dineroPropiedad - $operacion;
            $total += $dineroPropiedad - $operacion;
            // $arrayConcepto['concepto'] = $concepto[0]['concepto'];
            //$arrayOperacion['operacion'] = $operacion;

            /*  $prueba = [
              'ingresado' => $dineroPropiedad,
              'concepto' => $concepto[0]['concepto'],
              'operacion' => $operacion
              ];
             */






            array_push($prueba, ['ingresado' => $dineroPropiedad,
                'concepto' => $concepto[0]['concepto'],
                'operacion' => $operacion, 'restante' => $restante]);

            $dineroPropiedad -= $operacion;

            //dd($prueba);
            //dd($arrayoperacion);
            //array_push($array,$arrayoperacion,$arrayconcepto,$dineroIngresado);
            //$array['operacion'] = $operacion;
            // array_push($array,$arrayIngresado,$arrayConcepto,$arrayOperacion);
            /*  $array = [
              'ingresado' => $arrayIngresado,
              'concepto' =>  $arrayConcepto,
              'total'    =>  $arrayOperacion
              ];
             */

            $gastosPropiedad += $operacion;
            //array_push($array,$gastosPropiedad);
        }
        //echo $restante;
        //dd($prueba);
        //$total = $dineroPropiedad - sprintf("%01.2f",$gastosPropiedad);
        //dd($total);
        //array_push($array,$total);
        //echo $total;
        //dd($array);


        return view('movimientos/listaMovimientos', compact('propiedad', 'prueba', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
