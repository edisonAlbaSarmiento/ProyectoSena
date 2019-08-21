<?php

namespace App\Http\Controllers;
use App\Models\Empleado As Empleado;
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\Rol As Rol;
use App\Models\Titulo As Titulo;
use App\User As User; 
use App\Models\TipoDocumento As TipoDocumento;
use Illuminate\Http\Request;

use App\Http\Requests;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $empleado = Empleado::select('empleados.*','tipo_documentos.descripcion','centro_formacions.nombrecentro','estados.nombreestado','users.name')
        ->join('tipo_documentos','tipo_documentos.id','=','empleados.fkTipoDoc')
        ->join('centro_formacions','centro_formacions.id','=','empleados.fkCentro')
        ->join('estados','estados.id','=','empleados.fkEstado')
        ->join('users','users.id','=','empleados.fkuser')
        ->paginate(4);
        return \View::make('Empleado/listaempleado',compact('empleado')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::lists('nombreestado','id');
        $rol = Rol::lists('nombrerol','id');
        $titulo = Titulo::lists('titulo','id');
        $user = User::lists('name','id');
        
        return \View::make('Empleado\newempleado', compact('tipodocumento','centro','estado','rol','titulo','user')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;
        $user->name = $request->nombreempleado;
        $user->email = $request->correo;
        $user->password = bcrypt($request['identificacion']);
        $user->remember_token = $request->password;
        $user->save();


        $mesaje =[ 
            'nombreempleado.required' => 'El campo es obligatorio',
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
            'fkCentro.required' => 'El campo es obligatorio'
        ];
        $this->validate($request,[
            'nombreempleado' =>'required',
            'apellido' =>'required',
            'fkTipoDoc'=>'required',
            'identificacion'=>'required|max:15|unique:empleados,identificacion',
            'correo'=>'required|unique:empleados,correo',
            'telefonocelular'=>'required|max:10',
            'telefonofijo'=>'required |max:10',
            'direccion'=>'required',
            'fkCentro'=>'required'
           
        ],$mesaje);  
                $empleado= new Empleado;
                $empleado->nombreempleado=$request->nombreempleado;
                $empleado->apellido=$request->apellido;
                $empleado->fkTipoDoc=$request->fkTipoDoc;
                $empleado->identificacion=$request->identificacion;
                $empleado->direccion=$request->direccion;
                $empleado->telefonofijo=$request->telefonofijo;
                $empleado->telefonocelular=$request->telefonocelular;
                $empleado->correo=$request->correo;
                $empleado->fkCentro=$request->fkCentro;
                $empleado->fkEstado='15';
                $empleado->fkuser=$user->id;
            // dd($empleado);
                $empleado->save();

         

             //Peticion de la funcion store
        
         $idempleado = $empleado->id;

            for ($i=0; $i < $request->cantidad; $i++)
            {
                
                \DB::table('det_empleado_rols')->insertGetId(['fkEmpleado'=>$idempleado,'fkRol'=>$request->rol[$i]]);
            }
             for ($i=0; $i < $request->cantidadt; $i++)
            {
                
                \DB::table('det_titulo_empleados')->insertGetId(['fkEmpleado'=>$idempleado,'fkTitulo'=>$request->titulo[$i]]);
            }
          //  return redirect('empleado');
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
        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::select('estados.nombreestado','estados.id')
                    ->join('tipo_estados','estados.fktipoestado','=','tipo_estados.id')
                    ->where('tipo_estados.id','=',6)
                    ->get();
        $user = User::lists('name','id');
        $empleado =Empleado::find($id);
        return \View::make('Empleado/updateempleado',compact('tipodocumento','estado','centro','user','empleado')); 
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
        //me seleciona el usuario logeado y me trae los datos  para actulizar
        $user = User::select('users.*')
           ->join('empleados','users.id','=','empleados.fkuser')
           ->where('empleados.id','=',$request->id)
           ->get();
        foreach ($user as $user) {
            $user->name = $request->nombreempleado;
            $user->email = $request->correo;
            $user->password = bcrypt($request['identificacion']);
            $user->remember_token = $request->password;
            $user->save();
        }
            

  
          $mesaje =[ 
        'nombreempleado.required' => 'El campo es obligatorio',
        'apellido.required' => 'El campo es obligatorio',
        'fkTipoDoc.required' => 'El campo es obligatorio',
        'correo.required'=>'El :attribute debe ser ingresado',
        'telefonocelular.required'=>'El Telefono Celular debe ser ingresado',
        'telefonofijo.required'=>'El Telefono Fijo debe ser ingresado',
        'telefonocelular.max'=>'El valor ingresado  es demasiado largo',
        'telefonofijo.max'=>'El valor ingresado es demasiado largo',
        'direccion.required' => 'El campo es obligatorio',
        'fkCentro.required' => 'El campo es obligatorio',
        'fkEstado.required' => 'El campo es obligatorio'
        ];
                $this->validate($request,[
            'nombreempleado' =>'required',
            'apellido' =>'required',
            'fkTipoDoc'=>'required',
            'correo'=>'required',
            'telefonocelular'=>'required|max:10',
            'telefonofijo'=>'required |max:10',
            'direccion'=>'required',
            'fkCentro'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);   
                $empleado= Empleado::find($request->id);
                $empleado->nombreempleado=$request->nombreempleado;
                $empleado->apellido=$request->apellido;
                $empleado->fkTipoDoc=$request->fkTipoDoc;
                $empleado->identificacion=$request->identificacion;
                $empleado->direccion=$request->direccion;
                $empleado->telefonofijo=$request->telefonofijo;
                $empleado->telefonocelular=$request->telefonocelular;
                $empleado->correo=$request->correo;
                $empleado->fkCentro=$request->fkCentro;
                $empleado->fkEstado=$request->fkEstado;
                $empleado->fkuser=$user->id;               
                $empleado->save();
                
         return redirect('empleado');  
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
        ///funcion de buscar
        //creamos una consulta y una variable para recoger la informacion  
        $empleado = Empleado::where('nombreempleado','like','%'.$request->nombreempleado.'%')->select('empleados.*','tipo_documentos.descripcion','centro_formacions.nombrecentro','estados.nombreestado','users.name')
        ->join('tipo_documentos','tipo_documentos.id','=','empleados.fkTipoDoc')
        ->join('centro_formacions','centro_formacions.id','=','empleados.fkCentro')
        ->join('estados','estados.id','=','empleados.fkEstado')
        ->join('users','users.id','=','empleados.fkuser')
        ->paginate(4);
        
        return \View::make('Empleado\listaempleado',compact('empleado'));



    }
}
