<?php

namespace App\Http\Controllers;
use App\Models\Asistentes As Asistentes;
use App\Models\Acta As Acta;
use App\Models\Empleado As Empleado;
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;


use Illuminate\Http\Request;

use App\Http\Requests;

class AsistentesController extends Controller
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
      $asistente = Asistentes::select('Asistentes.*','actas.descripcion')
      ->join('actas','actas.id','=','Asistentes.fkacta')
      ->paginate(5);
        return \View::make('Asistentes/listasistente',compact('asistente','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();
      $acta = Acta::lists('descripcion','id');
         return \View::make('Asistentes/newasistentes', compact('acta','rolsEmpleado'));
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
            'nombreasistente' =>'required',
            'cargodependenciaentidad' =>'required',
            'fkacta' =>'required'
            ]);
        $asistentes=new Asistentes;
        $asistentes->create($request->all());
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get();  
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                    return redirect('asistentesLA');
                }
           if($roles->nombrerol =='Lider Articulacion') {
                return redirect('asistentes');
            }
            if ($roles->nombrerol == 'Instructor') {
                    return redirect('asistentesI');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
                return redirect('asistentesE');
            }
        }
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
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get();  
        $acta = Acta::lists('descripcion','id');
        $asistentes=Asistentes::find($id);
        return \View::make('Asistentes/updateasistentes',compact('asistentes','acta','rolsEmpleado'));
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
            'nombreasistente' =>'required',
            'cargodependenciaentidad' =>'required',
            'fkacta' =>'required'
            ]);
        $asistentes= Asistentes::find($request->id);
        $asistentes->nombreasistente=$request->nombreasistente;
        $asistentes->cargodependenciaentidad=$request->cargodependenciaentidad;
        $asistentes->fkacta=$request->fkacta;
         $asistentes->save();
         $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get();  
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                    return redirect('asistentesLA');
                }
           if($roles->nombrerol =='Lider Articulacion') {
                return redirect('asistentes');
            }
            if ($roles->nombrerol == 'Instructor') {
                    return redirect('asistentesI');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
                return redirect('asistentesE');
            }
        }
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
        //busca el nombre exactamente igual a la variable
              $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
        $asistente=Asistentes::where('nombreasistente','like','%'.$request->nombreasistente.'%')
        ->select('Asistentes.*','actas.descripcion')
        ->join('actas','actas.id','=','Asistentes.fkacta')
        ->paginate(5);
        return \View::make('Asistentes\listasistente',compact('asistente','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 



    }
}
