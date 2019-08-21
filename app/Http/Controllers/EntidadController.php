<?php

namespace App\Http\Controllers;
use App\Models\Entidad As Entidad;
use App\Models\TipoEntidad As TipoEntidad;
use App\Models\Estado As Estado;
use App\Models\Empleado As Empleado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;


use Illuminate\Http\Request;

use App\Http\Requests;

class EntidadController extends Controller
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
        $entidad = Entidad::select('entidads.*','tipo_entidads.nombretipoentidad','estados.nombreestado')
        ->join('tipo_entidads','tipo_entidads.id','=','entidads.fkTipoEntidad')
        ->join('estados','estados.id','=','entidads.fkEstado')
        ->paginate(5);
        return \View::make('Entidad/listaentidad',compact('entidad','rolsEmpleado'
        ,'empleado','tipodocumento','centro','estado','user'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoentidad = TipoEntidad::lists('nombretipoentidad','id');
        $estado = Estado::lists('nombreestado','id');
              return \View::make('Entidad/newentidad',compact('tipoentidad','estado')); 
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
        /*dd($request->all());*/
           $mesaje =[ 
           'nombreentidad.required'=>'La Nombre es obligatorio',
        'direccion.required'=>'La direccion es obligatoria',
        'fkTipoEntidad.required'=>'La Entidad es obligatoria',
         'fkEstado.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            'fkTipoEntidad' =>'required',
            'nombreentidad' =>'required',
            'direccion'=>'required',
            'telefono'=>'required|max:10',
            'fkEstado'=>'required'
            ],$mesaje); 
        $entidad=new Entidad;
        $entidad->create($request->all());
         return redirect('entidad');
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
        $tipoentidad = TipoEntidad::lists('nombretipoentidad','id');
        $estado = Estado::lists('nombreestado','id');
        $entidad=Entidad::find($id);
        return \View::make('Entidad/updateentidad',compact('entidad','tipoentidad','estado'));
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
           'nombreentidad.required'=>'La Nombre es obligatorio',
        'direccion.required'=>'La direccion es obligatoria',
        'fkTipoEntidad.required'=>'La Entidad es obligatoria',
         'fkEstado.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            'fkTipoEntidad' =>'required',
            'nombreentidad' =>'required',
            'direccion'=>'required',
            'telefono'=>'required|max:10',
            'fkEstado'=>'required'
            ],$mesaje); 
        $entidad= Entidad::find($request->id);
        $entidad->fkTipoEntidad=$request->fkTipoEntidad;
        $entidad->nombreentidad=$request->nombreentidad;
        $entidad->direccion=$request->direccion;
         $entidad->telefono=$request->telefono;
         $entidad->fkEstado=$request->fkEstado;
         $entidad->save();
         return redirect('entidad'); 
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
        $entidad = Entidad::where('nombreentidad','like','%'.$request->nombreentidad.'%')->select('entidads.*','tipo_entidads.nombretipoentidad','estados.nombreestado')
        ->join('tipo_entidads','tipo_entidads.id','=','entidads.fkTipoEntidad')
        ->join('estados','estados.id','=','entidads.fkEstado')
        ->paginate(5);
        return \View::make('Entidad/listaEntidad',compact('entidad','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));


    }
}
