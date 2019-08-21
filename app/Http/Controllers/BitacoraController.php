<?php

namespace App\Http\Controllers;
use App\Models\Bitacora As Bitacora;
use App\Models\TipoDocumento As TipoDocumento;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\Ficha As Ficha;
use App\Models\ProgramaFormacion As ProgramaFormacion;


use Illuminate\Http\Request;

use App\Http\Requests;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bitacora = Bitacora::select('bitacoras.*','centro_formacions.nombrecentro','programa_formacions.nombreprograma','fichas.numero','tipo_documentos.descripcion')
          ->join('centro_formacions','centro_formacions.id','=','bitacoras.fkCentro')
          ->join('programa_formacions','programa_formacions.id','=','bitacoras.fkPrograma')
          ->join('fichas','fichas.id','=','bitacoras.fkficha')
          ->join('tipo_documentos','tipo_documentos.id','=','bitacoras.fkTipoDoc')
          ->paginate(5);

          return \View::make('Bitacora/listbitacora',compact('bitacora')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $centro = CentroFormacion::lists('nombrecentro','id');
        $programa= ProgramaFormacion::lists('nombreprograma','id');
        $ficha = Ficha::lists('numero','id');
        $tipodocumento = TipoDocumento::lists('descripcion','id');
        return \View::make('Bitacora/newbitacora', compact('tipodocumento','centro','ficha','programa')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
                  //validacion
            $mesaje =[
            'correo.required'=>'El :attribute debe ser ingresado'
             ];
             $this->validate($request,[
          'regional' =>'required',
           'fkCentro' =>'required',
            'fkPrograma' =>'required',
            'fkFicha' =>'required',
            'nombreaprendiz' =>'required',
            'apellido' =>'required',
            'fkTipoDoc' =>'required',
            'identificacion' =>'required',
            'telefonoaprendiz' =>'required',
            'correo' =>'required',
            'razonsocial' =>'required',
            'direccionempresa' =>'required',
            'nit' =>'required',
            'nombreresponsable' =>'required',
            'cargo' =>'required',
            'telefonoempresa' =>'required',
            'emailempresa' =>'required'
            //'archivoadjunto' =>'required'
            ],$mesaje);

        $bitacora =new Bitacora;
        $bitacora->create($request->all());
         return redirect('bitacora');
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
        $centro = CentroFormacion::lists('nombrecentro','id');
        $programa = ProgramaFormacion::lists('nombreprograma','id');
        $ficha = Ficha::lists('numero','id');
        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $bitacora = Bitacora::find($id);
        return \View::make('Bitacora/updatebitacora',compact('bitacora','tipodocumento','centro','ficha','programa'));
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
          'regional' =>'required',
           'fkCentro' =>'required',
            'fkPrograma' =>'required',
            'fkFicha' =>'required',
            'nombreaprendiz' =>'required',
            'apellido' =>'required',
            'fkTipoDoc' =>'required',
            'identificacion' =>'required',
            'telefonoaprendiz' =>'required',
            'correo' =>'required',
            'razonsocial' =>'required',
            'direccionempresa' =>'required',
            'nit' =>'required',
            'nombreresponsable' =>'required',
            'cargo' =>'required',
            'telefonoempresa' =>'required',
            'emailempresa' =>'required'
            //'archivoadjunto' =>'required'
            ]);
        $bitacora= Bitacora::find($request->id);
        $bitacora->regional=$request->regional;
        $bitacora->fkCentro=$request->fkCentro;
        $bitacora->fkPrograma=$request->fkPrograma;
        $bitacora->fkFicha=$request->fkFicha;
        $bitacora->nombreaprendiz=$request->nombreaprendiz;
        $bitacora->apellido=$request->apellido;
        $bitacora->fkTipoDoc=$request->fkTipoDoc;
        $bitacora->identificacion=$request->identificacion;
        $bitacora->telefonoaprendiz=$request->telefonoaprendiz;
        $bitacora->correo=$request->correo;
        $bitacora->razonsocial=$request->razonsocial;
        $bitacora->direccionempresa=$request->direccionempresa;
        $bitacora->nit=$request->nit;
        $bitacora->nombreresponsable=$request->nombreresponsable;
        $bitacora->cargo=$request->cargo;
        $bitacora->telefonoempresa=$request->telefonoempresa;
        $bitacora->emailempresa=$request->emailempresa;
        $bitacora->archivoadjunto=$request->archivoadjunto;
       

       
         $bitacora->save();
         return redirect('bitacora'); 
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
        $bitacora=Bitacora::where('nombreaprendiz','like','%'.$request->nombreaprendiz.'%')->select('bitacoras.*','centro_formacions.nombrecentro','programa_formacions.nombreprograma','fichas.numero','tipo_documentos.descripcion')
        ->join('centro_formacions','centro_formacions.id','=','bitacoras.fkCentro')
        ->join('programa_formacions','programa_formacions.id','=','bitacoras.fkPrograma')
        ->join('fichas','fichas.id','=','bitacoras.fkficha')
        ->join('tipo_documentos','tipo_documentos.id','=','bitacoras.fkTipoDoc')
        ->paginate(5);

        return \View::make('Bitacora/listbitacora',compact('bitacora','empleado','tipodocumento','centro','estado','user')); 


    }
}
