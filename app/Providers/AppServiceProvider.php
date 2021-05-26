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
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'contenedor', 'name' => 'contenedor', 'text' => 'Contenedor'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.*', 'text' => 'Communities'],
            ['href' => 'comunidades.index', 'name' => 'Mi cuenta', 'text' => 'Mi cuenta'],
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Incidencias tabla'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.create', 'text' => 'Comunidades'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.show', 'text' => 'Acciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.edit', 'text' => 'Personas'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.update', 'text' => 'Proveedores'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.delete', 'text' => 'Inmuebles'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.restore', 'text' => 'Presupuestos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.eliminar', 'text' => 'Honorarios'],
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkCommunitiesLinks', [
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Acciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Comunidad'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Contactos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Conceptos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Convocatorias'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Cuentas bancarias'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Cuotas'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Diario'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Distribuciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Documentos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Fondos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Foro'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Importaciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Incidencias'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Informes'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Liquidaciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Movimientos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Obligaciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Posicion'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Presupuestos'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Propiedades'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Remesas'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Lecturas de agua'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Saldos iniciales']
        ]);
        
    }
}
