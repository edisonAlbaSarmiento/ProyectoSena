<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Empleado as Empleado;
use App\Models\Aprendiz as Aprendiz;
use App\Models\Rol as Rol;
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Aprendiz = Aprendiz::select('count(aprendizs.*)')
                    ->where('aprendizs.fkuser','=',\Auth::user()->id)
                    ->count();
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();           
        $empleado = Empleado::select('empleados.*')
        ->where('empleados.fkuser','=',\Auth::user()->id)
        ->get();

        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::lists('nombreestado','id');
        $user = User::lists('name','id');

        //dd($Aprendiz,$rolsEmpleado);
        return \View::make('home',compact('Aprendiz','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));
 
    }

        public function loading()
    {
     
        return \View::make('cargando');
    }
}