<?php

namespace App\Http\Controllers;
use App\Models\Actividades As Actividades;
use App\Models\Bitacora As Bitacora;
use App\Models\Empleado As Empleado;
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

use Illuminate\Http\Request;

use App\Http\Requests;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $empleado = Empleado::select('empleados.*')
        ->where('empleados.fkuser','=',\Auth::user()->id)
        ->get();

        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::lists('nombreestado','id');
        $user = User::lists('name','id');

        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();  
         $actividad = Actividades::select('actividades.*','bitacoras.nombreaprendiz')
         ->join('bitacoras','bitacoras.id','=','actividades.fkBitacora')
          ->paginate(5);
          return \View::make('Actividades/listactividades',compact('actividad','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $bitacora = Bitacora::lists('nombreaprendiz','id');
        return \View::make('Actividades/newactividades', compact('bitacora'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
          $this->validate($request,[
            'actividad' =>'required',
            'evidencias' =>'required',
            'fecha'=>'required',
            'lugar'=>'required',
            'fkBitacora'=>'required',
            ]);
          
        $actividades = new Actividades;
        $actividades->create($request->all());
         return redirect('actividades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bitacora = Bitacora::lists('nombreaprendiz','id');
        $actividades = Actividades::find($id);
        return \View::make('Actividades/updateactividades',compact('actividades','bitacora'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             //validacion
          $this->validate($request,[
            'actividad' =>'required',
            'evidencias' =>'required',
            'fecha'=>'required',
            'lugar'=>'required',
            'fkBitacora'=>'required',
            ]);
        $actividades= Actividades::find($request->id);
        $actividades->actividad=$request->actividad;
        $actividades->evidencias=$request->evidencias;
        $actividades->fecha=$request->fecha;
        $actividades->lugar=$request->lugar;
        $actividades->fkBitacora=$request->fkBitacora;
        $actividades->save();
         return redirect('actividades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
        public function search(Request $request)
    {
        $empleado = Empleado::select('empleados.*')
        ->where('empleados.fkuser','=',\Auth::user()->id)
        ->get();

        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::lists('nombreestado','id');
        $user = User::lists('name','id');
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();
        $actividad = Actividades::where('fecha','like','%'.$request->fecha.'%')->select('actividades.*','bitacoras.nombreaprendiz')
        ->join('bitacoras','bitacoras.id','=','actividades.fkBitacora')
        ->paginate(5);

        return \View::make('Actividades/listactividad',compact('actividad','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));



    }
}
