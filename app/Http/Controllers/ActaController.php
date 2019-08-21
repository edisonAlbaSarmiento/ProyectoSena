<?php

namespace App\Http\Controllers;
use App\Models\Acta As Acta;
use App\Models\Estado As Estado;
use App\Models\TipoActa As TipoActa;
use App\Models\Empleado As Empleado;
use App\Models\Ambiente As Ambiente;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

use Illuminate\Http\Request;

use App\Http\Requests;

class ActaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');//restrigir el acceso de las rutas sin haber iniciado sesion 
    }
    public function index()
    {
      //instancio los modelos y realizo una consulta
        $empleado = Empleado::select('empleados.*')//extiende a una funcion
        //busca la informacion que requiere del usuario logueado
        ->where('empleados.fkuser','=',\Auth::user()->id)
        //envia
        ->get();
        //instancias
        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::lists('nombreestado','id');
        $user = User::lists('name','id');
        //verifica el rol logueado mediante la consulta
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();  
        $acta =Acta::select('actas.*','estados.nombreestado','tipo_actas.nombretipoacta')
        ->join('estados','estados.id','=','actas.fkEstado')
        ->join('tipo_actas','tipo_actas.id','=','actas.fkTipoActa')
        ->paginate(3);
        
        //retorne y me envia a la lista compact:envia los objetos o variable
        return \View::make('Acta/listacta',compact('acta','rolsEmpleado','empleado','tipodocumento','centro','estado','user','ambientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //para que me guarde las variables por medio del id
        $estado = Estado::lists('nombreestado','id');
        $tipoacta = TipoActa::lists('nombretipoacta','id');
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();  
                    $ambientes = Ambiente::lists('nombreambiente','id');
       //retorne y me envia a la lista compact:envia los objetos o variable 
        return \View::make('Acta/newacta', compact('estado','tipoacta','rolsEmpleado','ambientes'));
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //por medio del metodo validate y lo que tenga por peticion que me lo meta en un array uso los atributos y pongo la validacion
               //validacion 
        //$mesaje =[ 
        //'telefonocelular.max'=>'El valor ingresado para  :attribute es demasiado largo',
        //'telefonofijo.max'=>'El valor ingresado para  :attribute es demasiado largo',
        //'identificacion.max'=>'El valor ingresado para  :attribute es demasiado largo'
        //s];
        $this->validate($request,[
            'fecha' =>'required|date',
            'fkTipoActa' =>'required',
            'descripcion' =>'required',
            'HoraInicio'=>'required',
            'HoraFin'=>'required',
            'temas'=>'required',
            'objetivo'=>'',
            'desarrolloreunion'=>'required',
            'conclusion'=>'required',
            //'archivoadjunto'=>'required',
            'fkEstado'=>'required'
            ]);//,$mesaje  

        $acta=new Acta;
         $acta->fecha=$request->fecha;
        $acta->fkTipoActa=$request->fkTipoActa;
        $acta->descripcion=$request->descripcion;
        $acta->HoraInicio=$request->HoraInicio;
        $acta->HoraFin=$request->HoraFin;
        $acta->temas=$request->temas;
        $acta->objetivo=$request->objetivo;
        $acta->desarrolloreunion=$request->desarrolloreunion;
        $acta->conclusion=$request->conclusion; 
        $acta->archivoadjunto=$request->archivoadjunto;
        $acta->fkEstado='1';
        $acta->save();
        
        
         $idActa = $acta->id;

            for ($i=0; $i < $request->cantidad; $i++)
            {
                
                \DB::table('det_ambiente_actas')->insertGetId(['fkActa'=>$idActa,'fkAmbiente'=>$request->Ambiente[$i]]);
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
      $estado = Estado::lists('nombreestado','id');
      $tipoacta = TipoActa::lists('nombretipoacta','id');
      $acta=Acta::find($id);
      $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
        return \View::make('Acta/updateacta',compact('acta','estado','tipoacta','rolsEmpleado'));
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
            'fecha' =>'required|date',
            'fkTipoActa' =>'required',
            'descripcion' =>'required',
            'HoraInicio'=>'required',
            'HoraFin'=>'required',
            'temas'=>'required',
            'objetivo'=>'required',
            'desarrolloreunion'=>'required',
            'conclusion'=>'required',
            //'archivoadjunto'=>'required',
            'fkEstado'=>'required'
            ]);
        $acta= Acta::find($request->id);
        $acta->fecha=$request->fecha;
        $acta->fkTipoActa=$request->fkTipoActa;
        $acta->descripcion=$request->descripcion;
        $acta->HoraInicio=$request->HoraInicio;
        $acta->HoraFin=$request->HoraFin;
        $acta->temas=$request->temas;
        $acta->objetivo=$request->objetivo;
        $acta->desarrolloreunion=$request->desarrolloreunion;
        $acta->conclusion=$request->conclusion;
        $acta->archivoadjunto=$request->archivoadjunto;
        $acta->fkEstado=$request->fkEstado;
         $acta->save();
         $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get();  
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor Lider Area') {
                    return redirect('actaLA');
                }
           if($roles->nombrerol =='Lider Articulacion') {
                return redirect('acta');
            }
            if ($roles->nombrerol == 'Instructor') {
                    return redirect('actaI');
                }
            if ($roles->nombrerol == 'Instructor Etapa Productiva') {
                return redirect('actaE');
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
      //para buscar 
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get(); 
        $acta = Acta::where('fecha','like','%'.$request->fecha.'%')
        ->select('actas.*','estados.nombreestado','tipo_actas.nombretipoacta')
        ->join('estados','estados.id','=','actas.fkEstado')
        ->join('tipo_actas','tipo_actas.id','=','actas.fkTipoActa')
        ->paginate(3);

        
        return \View::make('Acta\listacta',compact('acta','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));


    }
}
