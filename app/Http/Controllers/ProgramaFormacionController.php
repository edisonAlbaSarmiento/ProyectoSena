<?php

namespace App\Http\Controllers;
use App\Models\ProgramaFormacion As ProgramaFormacion;
use App\Models\Area As Area;
use App\Models\GradoFormacion As GradoFormacion;
use App\Models\Estado As Estado;
use App\Models\Empleado As Empleado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProgramaFormacionController extends Controller
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
            
         $programaformacion=ProgramaFormacion::select('programa_formacions.*','areas.nombrearea','grado_formacions.codigo','estados.nombreestado')
         ->join('areas','areas.id','=','programa_formacions.fkArea')
         ->join('grado_formacions','grado_formacions.id','=','programa_formacions.fkGrado')
         ->join('estados','estados.id','=','programa_formacions.fkEstado')
         ->paginate(5);
        return \View::make('ProgramaFormacion/listaprograma',compact('programaformacion','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $area = Area::lists('nombrearea','id');
      $gradoformacion = GradoFormacion::lists('codigo','id');
      $estado = Estado::lists('nombreestado','id');
        return \View::make('ProgramaFormacion/newprograma',compact('area','gradoformacion','estado'));
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
           'nombrearea.required'=>'El nombre obligatorio',
        'descripcion.required'=>'La :atribute es obligatoria',
        'fkArea.required'=>'La Area es obligatoria',
         'fkGrado.required'=>'El Grado Formacion es obligatorio',
         'fkEstado.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            'nombrearea' =>'required',
            'descripcion' =>'required',
            'fkArea'=>'required',
            'fkGrado'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);
        $programaformacion=new ProgramaFormacion;
        $programaformacion->create($request->all());
         return redirect('programaformacion');
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
      $area = Area::lists('nombrearea','id');
      $gradoformacion = GradoFormacion::lists('codigo','id');
      $estado = Estado::lists('nombreestado','id');
        $programaformacion=ProgramaFormacion::find($id);
        return \View::make('ProgramaFormacion/updateprograma',compact('programaformacion','area','gradoformacion','estado'));
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
           'nombreprograma.required'=>'El nombre obligatorio',
        'descripcion.required'=>'La :atribute es obligatoria',
        'fkArea.required'=>'La Area es obligatoria',
         'fkGrado.required'=>'El Grado Formacion es obligatorio',
         'fkEstado.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            'nombreprograma' =>'required',
            'descripcion' =>'required',
            'fkArea'=>'required',
            'fkGrado'=>'required',
            'fkEstado'=>'required'
            ],$mesaje); 

         $programaformacion= ProgramaFormacion::find($request->id);
        $programaformacion->nombreprograma=$request->nombreprograma;
        $programaformacion->descripcion=$request->descripcion;
        $programaformacion->fkArea=$request->fkArea;
        $programaformacion->fkGrado=$request->fkGrado;
        $programaformacion->fkEstado=$request->fkEstado;
         $programaformacion->save();
         return redirect('programaformacion');
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
        $programaformacion=ProgramaFormacion::where('nombreprograma','like','%'.$request->nombreprograma.'%')->select('programa_formacions.*','areas.nombrearea','grado_formacions.codigo','estados.nombreestado')
         ->join('areas','areas.id','=','programa_formacions.fkArea')
         ->join('grado_formacions','grado_formacions.id','=','programa_formacions.fkGrado')
         ->join('estados','estados.id','=','programa_formacions.fkEstado')
         ->paginate(5);
        return \View::make('ProgramaFormacion/listaprograma',compact('programaformacion','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 

    }
}
