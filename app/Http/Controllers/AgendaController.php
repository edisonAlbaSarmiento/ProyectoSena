<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Agenda As Agenda;
use App\Models\Estado As Estado;
use App\Models\Empleado As Empleado;
use App\Models\Entidad As Entidad;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //para que se muestre los datos en la modal
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
        $agenda = Agenda::select('agendas.*','estados.nombreestado','empleados.nombreempleado','entidads.nombreentidad')
        ->join('entidads','entidads.id','=','agendas.fkEntidad')
        ->join('empleados','empleados.id','=','agendas.fkEmpleado')
        ->join('estados','estados.id','=','agendas.fkEstado')
        ->paginate(5);

        return \View::make('Agenda/listaagenda',compact('agenda','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidad = Entidad::lists('nombreentidad','id');
        $estado = Estado::lists('nombreestado','id');
        $empleado = Empleado::lists('nombreempleado','id');
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
        return \View::make('Agenda/newagenda', compact('estado','empleado','entidad','rolsEmpleado'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $mesaje =[ 

        'titulo.required' => 'El campo es obligatorio',
        'fechaasignacion.required' => 'El campo es obligatorio',
        'fecharealizacion.required' => 'El campo es obligatorio',
        'hora.required' => 'El campo es obligatorio',
        'fkEntidad.required' => 'El campo es obligatorio',
        'fkEmpleado.required' => 'El campo es obligatorio'
        ];
            $this->validate($request,[
            'titulo'=>'required',
            'fechaasignacion' =>'required',
            'fecharealizacion'=>'required',
            'hora' =>'required',
            'fkEntidad'=>'required',
            'fkEmpleado'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);  
        $agenda=new Agenda;
        $agenda->create($request->all());
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                   return redirect('agendaLA');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
               return redirect('agendaE');
            }
            if ($roles->nombrerol == 'Instructor') {
                   return redirect('agendaI');
                }
            if ($roles->nombrerol == 'Lider Articulacion') {
               return redirect('agenda');
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
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entidad = Entidad::lists('nombreentidad','id');
        $estado = Estado::lists('nombreestado','id');
        $empleado = Empleado::lists('nombreempleado','id');
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
            $agenda = Agenda::find($id);
        return \View::make('Agenda/updateagenda', compact('agenda','estado','empleado','entidad','rolsEmpleado'));
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
          $mesaje =[ 
        'fechaasignacion.required' => 'El campo es obligatorio',
        'hora.required' => 'El campo es obligatorio',
        'fkEntidad.required' => 'El campo es obligatorio',
        'fkEmpleado.required' => 'El campo es obligatorio'        
        ];
        $this->validate($request,[
            'fechaasignacion' =>'required',
            'hora' =>'required',
            'fkEntidad'=>'required',
            'fkEmpleado'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);  
        $agenda= Agenda::find($request->id);
        $agenda->titulo=$request->titulo;
        $agenda->fechaasignacion=$request->fechaasignacion;
        $agenda->fecharealizacion=$request->fecharealizacion;
        $agenda->hora=$request->hora;
        $agenda->fkEntidad=$request->fkEntidad;
        $agenda->fkEmpleado=$request->fkEmpleado;
        $agenda->fkEstado=$request->fkEstado;
        $agenda->save();
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                   return redirect('agendaLA');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
               return redirect('agendaE');
            }
            if ($roles->nombrerol == 'Instructor') {
                   return redirect('agendaI');
                }
            if ($roles->nombrerol == 'Lider Articulacion') {
               return redirect('agenda');
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
    
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
      ///fuincion de buscar
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
        //creamos una consulta y una variable para recoger la informacion  
        $agenda = Agenda::where('fechaasignacion','like','%'.$request->fechaasignacion.'%')->select('agendas.*','estados.nombreestado','empleados.nombreempleado','entidads.nombreentidad')
        ->join('entidads','entidads.id','=','agendas.fkEntidad')
        ->join('empleados','empleados.id','=','agendas.fkEmpleado')
        ->join('estados','estados.id','=','agendas.fkEstado')
        ->paginate(5);
        
        return \View::make('Agenda\listaagenda',compact('agenda','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));



    }

}
