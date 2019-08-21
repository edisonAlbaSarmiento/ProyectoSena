<?php
namespace App\Http\Controllers;

use App\Models\Ambiente As Ambiente;
use App\Models\Estado As Estado;
use App\Models\Entidad As Entidad;
use App\Models\Empleado As Empleado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

use Illuminate\Http\Request;

use App\Http\Requests;

class AmbienteController extends Controller
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
         $ambiente = Ambiente::select('ambientes.*','estados.nombreestado','entidads.nombreentidad')
         ->join('estados','estados.id','=','ambientes.fkEstado')
        ->join('entidads','entidads.id','=','ambientes.fkEntidad')
          ->paginate(5);

          return \View::make('Ambiente/listambiente',compact('ambiente','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::lists('nombreestado','id');
        $entidad = Entidad::lists('nombreentidad','id');
        return \View::make('Ambiente/newambiente', compact('estado','entidad'));  
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
            'nombreambiente' =>'required',
            'fkEstado' =>'required',
            'fkEntidad' =>'required'
            ]);
        $ambiente =new Ambiente;
        $ambiente->create($request->all());
         return redirect('ambiente');
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
        $estado = Estado::lists('nombreestado','id');
        $entidad = Entidad::lists('nombreentidad','id');
        $ambiente = Ambiente::find($id);
        return \View::make('Ambiente/updateambiente',compact('ambiente','estado','entidad'));

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
            'nombreambiente' =>'required',
            'fkEstado' =>'required',
            'fkEntidad' =>'required'
            ]);
        $ambiente= Ambiente::find($request->id);
        $ambiente->nombreambiente=$request->nombreambiente;
        $ambiente->fkEstado=$request->fkEstado;
        $ambiente->fkEntidad=$request->fkEntidad;
         $ambiente->save();
         return redirect('ambiente');
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
        $ambiente=Ambiente::where('nombreambiente','like','%'.$request->nombreambiente.'%')->select('ambientes.*','estados.nombreestado','entidads.nombreentidad')
         ->join('estados','estados.id','=','ambientes.fkEstado')
        ->join('entidads','entidads.id','=','ambientes.fkEntidad')
          ->paginate(5);
        return \View::make('Ambiente/listambiente',compact('ambiente','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));

    }
}
