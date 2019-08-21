<?php

namespace App\Http\Controllers;
use App\Models\Ficha As Ficha;
use App\Models\ProgramaFormacion As ProgramaFormacion;
use App\Models\Entidad As Entidad;
use App\Models\Empleado As Empleado;
use App\Models\Estado As Estado;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;

use Illuminate\Http\Request;



class FichaController extends Controller
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
        $ficha = Ficha::select('fichas.*','programa_formacions.nombreprograma','entidads.nombreentidad')
          ->join('programa_formacions','programa_formacions.id','=','fichas.fkPrograma')
          ->join('entidads','entidads.id','=','fichas.fkEntidad')
          ->paginate(5);
          return \View::make('Ficha/listaficha',compact('ficha','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $programaformacion = ProgramaFormacion::lists('nombreprograma','id');
        $entidad = Entidad::lists('nombreentidad','id');
     return \View::make('Ficha/newficha',compact('programaformacion','entidad'));    

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
           'numero.required'=>'La Numero En sofia es obligatorio',
        'HoraInicioSofia.required'=>'La Fecha es obligatoria',
        'fkPrograma.required'=>'El programa es obligatorio',
         'fkEntidad.required'=>'El Entidad es obligatorio'
        ];
            $this->validate($request,[
            'numero' =>'required|number',
            'HoraInicioSofia' =>'required',
            'HoraFinSofia'=>'required',
            'fkPrograma'=>'required',
            'fkEntidad'=>'required'
            ],$mesaje); 
        $ficha=new Ficha;
        $ficha->create($request->all());
         return redirect('ficha');
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
        $programaformacion = ProgramaFormacion::lists('nombreprograma','id');
        $entidad = Entidad::lists('nombreentidad','id');
         $ficha=Ficha::find($id);
        return \View::make('Ficha/updateficha',compact('progrmaformacion','entidad','ficha'));
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
           'numero.required'=>'La Numero En sofia es obligatorio',
        'HoraInicioSofia.required'=>'La Fecha es obligatoria',
        'fkPrograma.required'=>'El programa es obligatorio',
         'fkEntidad.required'=>'El Entidad es obligatorio'
        ];
            $this->validate($request,[
            'numero' =>'required|number',
            'HoraInicioSofia' =>'required',
            'HoraFinSofia'=>'required',
            'fkPrograma'=>'required',
            'fkEntidad'=>'required'
            ],$mesaje); 
         $ficha= Ficha::find($request->idficha);
        $ficha->numero=$request->numero;
        $ficha->HoraInicioSofia=$request->HoraInicioSofia;
        $ficha->HoraFinSofia=$request->HoraFinSofia;
         $ficha->fkPrograma=$request->fkPrograma;
         $ficha->fkEntidad=$request->fkEntidad;
         $ficha->save();
         return redirect('ficha'); 
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
            
        $ficha=Ficha::where('numero','like','%'.$request->numero.'%')->select('fichas.*','programa_formacions.nombreprograma','entidads.nombreentidad')
          ->join('programa_formacions','programa_formacions.id','=','fichas.fkPrograma')
          ->join('entidads','entidads.id','=','fichas.fkEntidad')
          ->paginate(5);
        return \View::make('Ficha/listaficha',compact('ficha','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));

}

    }

