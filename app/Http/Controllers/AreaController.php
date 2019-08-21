<?php

namespace App\Http\Controllers;
use App\Models\Area As Area;
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\Models\Empleado As Empleado; 
use App\User As User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AreaController extends Controller
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
        $area = Area::select('areas.*','estados.nombreestado','centro_formacions.nombrecentro')
            ->join('estados','estados.id','=','areas.fkEstado')
            ->join('centro_formacions','centro_formacions.id','=','areas.fkCentro')
            ->paginate(5);

        
          return \View::make('Area/listarea',compact('area','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::lists('nombreestado','id');
        $centro = CentroFormacion::lists('nombrecentro','id');
        return \View::make('Area/newarea', compact('estado','centro'));  
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
        'descripcion.max'=>'El valor ingresado para  :attribute es demasiado largo'
        ];
            $this->validate($request,[
            'nombrearea' =>'required',
            'descripcion' =>'required|max:500',
            'fkCentro'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);  

         $area=new Area;
        $area->create($request->all());
         return redirect('area');
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
        $centro = CentroFormacion::lists('nombrecentro','id');
        $area=Area::find($id);
        return \View::make('Area/updatearea',compact('area','estado','centro'));
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
        'descripcion.max'=>'El valor ingresado para descripcion es demasiado largo'
        ];
            $this->validate($request,[
            'nombrearea' =>'required',
            'descripcion' =>'required|max:500',
            'fkCentro'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);  
        $area= Area::find($request->id);
        $area->nombrearea=$request->nombrearea;
        $area->descripcion=$request->descripcion;
        $area->fkCentro=$request->fkCentro;
        $area->fkEstado=$request->fkEstado;
        $area->save();
         return redirect('area');  
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
        //busca el nombre exactamente igual a la variable 
        $area=Area::where('nombrearea','like','%'.$request->nombrearea.'%')->select('areas.*','estados.nombreestado','centro_formacions.nombrecentro')
            ->join('estados','estados.id','=','areas.fkEstado')
            ->join('centro_formacions','centro_formacions.id','=','areas.fkCentro')
            ->paginate(5);
            
            return \View::make('Area/listarea',compact('area','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));




    }
}
