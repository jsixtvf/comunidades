<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Illuminate\Support\Facades\View::share('navLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard']
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Incidencias tabla'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Comunidades'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Acciones'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Personas'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Inmuebles'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Presupuestos'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Honorarios'],
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkCommunitiesLinks', [
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Acciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Comunidad'],
            ['href' => 'usuarios.index', 'name' => 'usuarios.index', 'text' => 'Usuarios'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Contactos'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Conceptos'],
            ['href' => 'juntas.index', 'name' => 'juntas.index', 'text' => 'Juntas'],
            ['href' => 'cuentasBancarias.index', 'name' => 'cuentasBancarias.index', 'text' => 'Cuentas bancarias'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Cuotas'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Diario'],
            ['href' => 'distribucion.index', 'name' => 'distribucion.index', 'text' => 'Distribuciones'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Documentos'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Fondos'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Foro'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Importaciones'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Incidencias'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Informes'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Liquidaciones'],
            ['href' => 'movimientos.index', 'name' => 'movimientos.index', 'text' => 'Movimientos'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Obligaciones'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Posicion'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Presupuestos'],
            ['href' => 'propiedades.index', 'name' => 'propiedades.index', 'text' => 'Propiedades'],
            ['href' => 'proveedores.pasarComunidad', 'name' => 'proveedores.pasarComunidad', 'text' => 'Proveedores'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Remesas'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Lecturas de agua'],
            ['href' => 'comunidades.index', 'name' => '', 'text' => 'Saldos iniciales']
        ]);
        
    }
}
