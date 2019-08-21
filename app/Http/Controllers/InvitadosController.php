<?php

namespace App\Http\Controllers;
use App\Models\Invitados As Invitados;
use App\Models\Acta as Acta;
use App\Models\Empleado As Empleado;
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

use Illuminate\Http\Request;

use App\Http\Requests;

class InvitadosController extends Controller
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
        $invitado = Invitados::select('Invitados.*','actas.descripcion')
      ->join('actas','actas.id','=','Invitados.fkacta')
      ->paginate(5);
        return \View::make('Invitados/listainvitados',compact('invitado','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  
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
         return \View::make('Invitados/newinvitados',compact('acta','rolsEmpleado'));
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
          $mesaje =[ 
        'nombreinvitado.required'=>'El nombre obligatorio',
        'cargo.required'=>'El cargo es obligatoria',
        'entidad.required'=>'La entidad es obligatoria',
         'fkacta.required'=>'El Acta es obligatorio'
        ];
            $this->validate($request,[
            'nombreinvitado' =>'required',
            'cargo' =>'required',
            'entidad'=>'required',
            'fkacta'=>'required'
            ],$mesaje);
        $invitados=new Invitados;
        $invitados->create($request->all());
        $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get();  
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                    return redirect('invitadosLA');
                }
           if($roles->nombrerol =='Lider Articulacion') {
                return redirect('invitados');
            }
            if ($roles->nombrerol == 'Instructor') {
                    return redirect('invitadosI');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
                return redirect('invitadosE');
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
         $invitados=Invitados::find($id);
        return \View::make('Invitados/updateinvitados',compact('invitados','acta','rolsEmpleado'));
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
           $mesaje =[ 
           'nombreinvitado.required'=>'El nombre obligatorio',
        'cargo.required'=>'El cargo es obligatoria',
        'entidad.required'=>'La entidad es obligatoria',
         'fkacta.required'=>'El Acta es obligatorio'
        ];
            $this->validate($request,[
            'nombreinvitado' =>'required',
            'cargo' =>'required',
            'entidad'=>'required',
            'fkacta'=>'required'
            ],$mesaje); 
        $invitados= Invitados::find($request->id);
        $invitados->nombreinvitado=$request->nombreinvitado;
        $invitados->cargo=$request->cargo;
        $invitados->entidad=$request->entidad;
        $invitados->fkacta=$request->fkacta;
         $invitados->save();
         $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get();  
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                    return redirect('invitadosLA');
                }
           if($roles->nombrerol =='Lider Articulacion') {
                return redirect('invitados');
            }
            if ($roles->nombrerol == 'Instructor') {
                    return redirect('invitadosI');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
                return redirect('invitadosE');
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
        $invitado = Invitados::where('nombreinvitado','like','%'.$request->nombreinvitado.'%')
        ->select('Invitados.*','actas.descripcion')
        ->join('actas','actas.id','=','Invitados.fkacta')
        ->paginate(5);
        return \View::make('Invitados\listainvitados',compact('invitado','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 



    }
}
