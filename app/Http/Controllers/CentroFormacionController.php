<?php

namespace App\Http\Controllers;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\Ciudad As Ciudad;
use App\Models\Empleado As Empleado;
use App\Models\Estado As Estado;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;




use Illuminate\Http\Request;

use App\Http\Requests;

class CentroFormacionController extends Controller
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
        $centroformacion = CentroFormacion::select('centro_formacions.*','ciudads.nombreciudad')
        ->join('ciudads','ciudads.id','=','centro_formacions.fkCiudad')
        ->paginate(5);

        return \View::make('CentroFormacion/listcentroformacion',compact('centroformacion','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $ciudad = Ciudad::lists('nombreciudad','id');
          return \View::make('CentroFormacion/newcentroformacion', compact('ciudad')); 
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
        'direccion.required'=>'La direccion es obligatoria',
        'max'=>'el valor es demaciado largo Max 10',
        'fkCiudad.required'=>'La Ciudad es obligatoria'
        ];
            $this->validate($request,[
            'nombrecentro' =>'required',
            'direccion' =>'required',
            'telefono'=>'required|max:10',
            'fkCiudad'=>'required'
            ],$mesaje);   
             $centroformacion=new CentroFormacion;
        $centroformacion->create($request->all());
         return redirect('centroformacion');
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
        $ciudad = Ciudad::lists('nombreciudad','id');
        $centroformacion=CentroFormacion::find($id);
        return \View::make('CentroFormacion/updatecentroformacion', compact('ciudad','centroformacion'));
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
        'direccion.required'=>'La direccion es obligatoria',
        'max'=>'el valor es demaciado largo Max 10',
        'fkCiudad.required'=>'La Ciudad es obligatoria'
        ];
            $this->validate($request,[
            'nombrecentro' =>'required',
            'direccion' =>'required',
            'telefono'=>'required|max:10',
            'fkCiudad'=>'required'
            ],$mesaje);  
            $centroformacion= CentroFormacion::find($request->id);
            $centroformacion->nombrecentro=$request->nombrecentro;
            $centroformacion->direccion=$request->direccion;
            $centroformacion->telefono=$request->telefono;
            $centroformacion->fkCiudad=$request->fkCiudad;
            $centroformacion->save();
         return redirect('centroformacion'); 
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


        $centroformacion = CentroFormacion::where('nombrecentro','like','%'.$request->nombrecentro.'%')->select('centro_formacions.*','ciudads.nombreciudad')
        ->join('ciudads','ciudads.id','=','centro_formacions.fkCiudad')
        ->paginate(5);
        return \View::make('CentroFormacion/listcentroformacion',compact('centroformacion','rolsEmpleado','empleado','tipodocumento','centro','estado','user')); 



    }
}
