<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz As Aprendiz;
use App\Models\TipoDocumento As TipoDocumento;
use App\Models\EstadoAprendiz As EstadoAprendiz;
use App\Models\Modalidad As Modalidad;
use App\Models\Ficha As Ficha;
use App\Models\Entidad As Entidad;
use App\Models\Titulo As Titulo;
use App\User As User;
use App\Models\Empleado As Empleado; 
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;


use Illuminate\Http\Request;

use App\Http\Requests;

class AprendizController extends Controller
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

        /*llamamos los datos de los modelos y las llaves foraneas por medio de una consulta*/
        $aprendiz = Aprendiz::select('aprendizs.*','tipo_documentos.descripcion','estado_aprendizs.nombreestado','modalidads.nombremodalidad','fichas.numero','users.name')
        ->join('tipo_documentos','tipo_documentos.id','=','aprendizs.fkTipoDoc')
        ->join('estado_aprendizs','estado_aprendizs.id','=','aprendizs.fkEstadoAprendiz')
        ->join('modalidads','modalidads.id','=','aprendizs.fkModalidad')
        ->join('fichas','fichas.id','=','aprendizs.fkFicha')
        ->join('users','users.id','=','aprendizs.fkuser')
        ->paginate(5);
        return \View::make('Aprendiz/listapren',compact('aprendiz','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  
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

        $tipodoc = TipoDocumento::lists('descripcion','id');
        $estado = EstadoAprendiz::lists('nombreestado','id');
        $modalidad = Modalidad::lists('nombremodalidad','id');
        $ficha = Ficha::lists('numero','id');
        $entidad = Entidad::lists('nombreentidad','id');
        $titulo = Titulo::lists('titulo','id');
        $user = User::lists('name','id');
        return \View::make('Aprendiz/newapren',compact('tipodoc','estado','modalidad','ficha','entidad','titulo','user','rolsEmpleado'));  
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request->all());*/
            $user = new User;
            $user->name = $request->nombreaprendiz;
            $user->email = $request->correo;
            $user->password = bcrypt($request['identificacion']);
            $user->remember_token = $request->password;
            $user->save();
        //validacion
        //la variable mensaje se crea por me dio de un array para personalizar mi mensaje 
        $mesaje =[ 
            'nombreaprendiz.required' => 'El campo es obligatorio',
            'nombreaprendiz.alpha' => 'Solo Letras Por Favor',
            'apellido.alpha' => 'Solo Letras Por Favor',
            'apellido.required' => 'El campo es obligatorio',
            'fkTipoDoc.required' => 'El campo es obligatorio',
            'identificacion.required' => 'El campo es obligatorio',
            'identificacion.max'=>'El valor ingresado es demasiado largo',
            'correo.required'=>'El :attribute debe ser ingresado',
            'telefonocelular.required'=>'El Telefono Celular debe ser ingresado',
            'telefonofijo.required'=>'El Telefono Fijo debe ser ingresado',
            'telefonocelular.max'=>'El valor ingresado  es demasiado largo',
            'telefonofijo.max'=>'El valor ingresado es demasiado largo',
            'direccion.required' => 'El campo es obligatorio',
            'fkEstadoAprendiz.required' => 'El campo es obligatorio',
            'fkModalidad.required' => 'El campo es obligatorio',
            'fkFicha.required' => 'El campo es obligatorio'
        ];
        $this->validate($request,[
            'nombreaprendiz' =>'required|alpha',
            'apellido' =>'required|alpha',
            'fkTipoDoc'=>'required',
            'identificacion'=>'required|max:15|unique:aprendizs,identificacion',
            'correo'=>'required|unique:aprendizs,correo',
            'telefonocelular'=>'required|max:10',
            'telefonofijo'=>'required |max:10',
            'direccion'=>'required',
            'fkEstadoAprendiz'=>'required',
            'fkModalidad'=>'required',
            'fkFicha'=>'required'            
        ],$mesaje);   
                $aprendiz= new Aprendiz;
                $aprendiz->nombreaprendiz=$request->nombreaprendiz;
                $aprendiz->apellido=$request->apellido;
                $aprendiz->fkTipoDoc=$request->fkTipoDoc;
                $aprendiz->identificacion=$request->identificacion;
                $aprendiz->correo=$request->correo;
                $aprendiz->telefonocelular=$request->telefonocelular;
                $aprendiz->telefonofijo=$request->telefonofijo;
                $aprendiz->direccion=$request->direccion;
                $aprendiz->fkEstadoAprendiz=$request->fkEstadoAprendiz;
                $aprendiz->fkModalidad=$request->fkModalidad;
                $aprendiz->fkFicha=$request->fkFicha; 
                $aprendiz->fkuser=$user->id;          
                $aprendiz->save();

         $idaprendiz = $aprendiz->id;

            
       
            for ($i=0; $i < $request->cantidad; $i++)
            {
                
                \DB::table('det_entidad_aprendizs')->insertGetId(['fkAprendiz'=>$idaprendiz,'fkEntidad'=>$request->enti[$i]]);
            }

         

            for ($i=0; $i < $request->cantidadt; $i++)
            {
                
                \DB::table('det_titulo_aprendizs')->insertGetId(['fkAprendiz'=>$idaprendiz,'fkTitulo'=>$request->titulo[$i]]);
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
        $tipodoc = TipoDocumento::lists('descripcion','id');
        $estado = EstadoAprendiz::lists('nombreestado','id');
        $modalidad = Modalidad::lists('nombremodalidad','id');
        $ficha = Ficha::lists('numero','id');
        $entidad = Entidad::lists('nombreentidad','id');
        $user = User::lists('name','id');
        $aprendiz=Aprendiz::find($id);
        return \View::make('Aprendiz/updateapren',compact('tipodoc','estado','modalidad','ficha','aprendiz','entidad','user','rolsEmpleado'));  
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
        $user = new User;
            $user->name = $request->nombreaprendiz;
            $user->email = $request->correo;
            $user->password = bcrypt($request['identificacion']);
            $user->remember_token = $request->password;
            $user->save();

       $mesaje =[ 
        'nombreaprendiz.required' => 'El campo es obligatorio',
        'apellido.required' => 'El campo es obligatorio',
        'fkTipoDoc.required' => 'El campo es obligatorio',
        'identificacion.max'=>'El valor ingresado es demasiado largo',
        'correo.required'=>'El :attribute debe ser ingresado',
        'telefonocelular.required'=>'El Telefono Celular debe ser ingresado',
        'telefonofijo.required'=>'El Telefono Fijo debe ser ingresado',
        'telefonocelular.max'=>'El valor ingresado  es demasiado largo',
        'telefonofijo.max'=>'El valor ingresado es demasiado largo',
        'direccion.required' => 'El campo es obligatorio',
        'fkEstadoAprendiz.required' => 'El campo es obligatorio',
        'fkModalidad.required' => 'El campo es obligatorio',
        'fkFicha.required' => 'El campo es obligatorio'
        ];
                $this->validate($request,[
            'nombreaprendiz' =>'required',
            'apellido' =>'required',
            'fkTipoDoc'=>'required',
            'identificacion'=>'max:15',
            'correo'=>'required',
            'telefonocelular'=>'required|max:10',
            'telefonofijo'=>'required |max:10',
            'direccion'=>'required',
            'fkEstadoAprendiz'=>'required',
            'fkModalidad'=>'required',
            'fkFicha'=>'required'
            ],$mesaje);  

                $aprendiz= Aprendiz::find($request->id);
                $aprendiz->nombreaprendiz=$request->nombreaprendiz;
                $aprendiz->apellido=$request->apellido;
                $aprendiz->fkTipoDoc=$request->fkTipoDoc;
                $aprendiz->identificacion=$request->identificacion;
                $aprendiz->correo=$request->correo;
                $aprendiz->telefonocelular=$request->telefonocelular;
                $aprendiz->telefonofijo=$request->telefonofijo;
                $aprendiz->direccion=$request->direccion;
                $aprendiz->fkEstadoAprendiz=$request->fkEstadoAprendiz;
                $aprendiz->fkModalidad=$request->fkModalidad;
                $aprendiz->fkFicha=$request->fkFicha;  
                $aprendiz->fkuser=$user->id;          
                $aprendiz->save();
            $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor') {
                   return redirect('aprendizI');
                }
            if ($roles->nombrerol == 'Lider Articulacion') {
                   return redirect('aprendiz');
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
              $rolsEmpleado = Empleado::select('rols.nombrerol')
            ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
            ->join('rols','rols.id','=','det_empleado_rols.fkRol')
            ->where('empleados.fkuser','=',\Auth::user()->id)
            ->get(); 
       $aprendiz = Aprendiz::where('nombreaprendiz','like','%'.$request->nombreaprendiz.'%')
       ->select('aprendizs.*','tipo_documentos.descripcion','estado_aprendizs.nombreestado','modalidads.nombremodalidad','fichas.numero','users.name')
        ->join('tipo_documentos','tipo_documentos.id','=','aprendizs.fkTipoDoc')
        ->join('estado_aprendizs','estado_aprendizs.id','=','aprendizs.fkEstadoAprendiz')
        ->join('modalidads','modalidads.id','=','aprendizs.fkModalidad')
        ->join('fichas','fichas.id','=','aprendizs.fkFicha')       
        ->join('users','users.id','=','aprendizs.fkuser')
        ->paginate(5);

        //busca el nombre exactamente igual a la variable 
        // $aprendiz=Aprendiz::where('identificacion','='.$request->identificacion)->paginate(5);


        return \View::make('Aprendiz/listapren',compact('aprendiz','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));  

    }
}
