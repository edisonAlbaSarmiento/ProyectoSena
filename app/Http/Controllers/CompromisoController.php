<?php
namespace App\Http\Controllers;

use App\Models\Compromiso as Compromiso;
use App\Models\Acta as Acta;
use App\Models\Estado As Estado;
use App\Models\Empleado As Empleado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

use Illuminate\Http\Request;

use App\Http\Requests;

class CompromisoController extends Controller
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
         $compromiso = Compromiso::select('compromisos.*','actas.descripcion','estados.nombreestado')
         ->join('actas','actas.id','=','compromisos.fkacta')
         ->join('estados','estados.id','=','compromisos.fkestado')
         ->paginate(5);
        return \View::make('Compromiso/listcompromisos',compact('compromiso','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 
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
      $estado = Estado::lists('nombreestado','id');
        return \View::make('Compromiso/newcompromiso', compact('acta','estado','rolsEmpleado'));
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
        'Actividades.required'=>'Las actividades son obligatorias',
        'fkacta.required'=>'La Acta es obligatoria',
        'fkestado.required'=>'La Acta es obligatoria'
        ];
            $this->validate($request,[
            'Actividades' =>'required',
            'responsables' =>'required',
            'fecha'=>'required|date',
            'fkacta'=>'required',
            'fkestado'=>'required'
            ],$mesaje);  
        $compromiso=new Compromiso;
        $compromiso->create($request->all());
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();
                    //se hace una condicion para saber que retorna cada rol en su respectiva ruta lo demas es igual ?
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                    return redirect('compromisoLA');
                }
            if($roles->nombrerol =='Lider Articulacion') {
                return redirect('compromiso');
            }
            if ($roles->nombrerol == 'Instructor') {
                    return redirect('compromisoI');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
                return redirect('compromisoE');
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
      $estado = Estado::lists('nombreestado','id');
         $compromiso = Compromiso::find($id);
        return \View::make('Compromiso/updatecompromiso',compact('compromiso','acta','estado','rolsEmpleado'));
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
        'Actividades.required'=>'Las actividades son obligatorias',
        'fkacta.required'=>'La Acta es obligatoria',
        'fkestado.required'=>'La Acta es obligatoria'
        ];
            $this->validate($request,[
            'Actividades' =>'required',
            'responsables' =>'required',
            'fecha'=>'required|date',
            'fkacta'=>'required',
            'fkestado'=>'required'
            ],$mesaje);  
        $compromiso = Compromiso::find($request->id);
        $compromiso->Actividades = $request->Actividades;
        $compromiso->responsables = $request->responsables;
        $compromiso->fecha = $request->fecha;
        $compromiso->fkacta = $request->fkacta;
        $compromiso->fkestado = $request->fkestado;
        $compromiso-> save();
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();
                    //se hace una condicion para saber que retorna cada rol en su respectiva ruta lo demas es igual ?
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                    return redirect('compromisoLA');
                }
            if($roles->nombrerol =='Lider Articulacion') {
                return redirect('compromiso');
            }
            if ($roles->nombrerol == 'Instructor') {
                    return redirect('compromisoI');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
                return redirect('compromisoE');
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
    //Funcion para crear consultas sql//
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
       $compromiso = Compromiso::where('fecha','like','%'.$request->fecha.'%')->select('compromisos.*','actas.descripcion','estados.nombreestado')
         ->join('actas','actas.id','=','compromisos.fkacta')
         ->join('estados','estados.id','=','compromisos.fkestado')
         ->paginate(5);
       return \View::make('listcompromisos',compact('compromiso','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 
     }
}
