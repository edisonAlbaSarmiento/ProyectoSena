<?php

namespace App\Http\Controllers;

use App\Models\Requisito As Requisito;

use App\Models\GradoFormacion As GradoFormacion;

use App\Models\EstadoRequisito As EstadoRequisito;

use App\Models\Tiporequisito As Tiporequisito;

use Illuminate\Http\Request;

use App\Http\Requests;

class RequisitoController extends Controller
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
      $requisito=   Requisito::select('requisitos.*','tiporequisitos.nombre','grado_formacions.codigo','estado_requisitos.nombre')
      ->join('tiporequisitos','tiporequisitos.id','=','requisitos.fkTipoRequisito')
      ->join('grado_formacions','grado_formacions.id','=','requisitos.fkGradoFormacion')
      ->join('estado_requisitos','estado_requisitos.id','=','requisitos.fkEstadoRequisito')
      ->paginate(5);
     return \View::make('Requisitos/listarequisitos',compact('requisito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tiporequisito = Tiporequisito::lists('nombre','id');
      $gradoformacion = GradoFormacion::lists('codigo','id');
      $estadorequisito = EstadoRequisito::lists('nombre','id');
        return \View::make('Requisitos/newrequisitos',compact('tiporequisito','gradoformacion','estadorequisito'));
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
           'nombrerequisito.required'=>'El nombrerequisito obligatorio',
        'observacion.required'=>'La :atribute es obligatoria',
        'fkTipoRequisito.required'=>'El Tipo De Requisito es obligatorio',
         'fkGradoFormacion.required'=>'El Grado Formacion es obligatorio',
         'fkEstadoRequisito.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            'nombrerequisito' =>'required',
            'observacion' =>'required',
            //'archivoadjunto'=>'required',
            'fkTipoRequisito'=>'required',
            'fkGradoFormacion'=>'required',
            'fkEstadoRequisito'=>'required'
            ],$mesaje);
            
      $requisito=new Requisito;
      $requisito->create($request->all());
       return redirect('requisito');
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
      $tiporequisito = Tiporequisito::lists('nombre','id');
      $gradoformacion = GradoFormacion::lists('codigo','id');
      $estadorequisito = EstadoRequisito::lists('nombre','id');
      $requsito = Requisito::find($id);
      return \View::make('Requisito/updateprograma',compact('requsito','tiporequisito','gradoformacion','estadorequisito'));
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
           'nombrerequisito.required'=>'El nombrerequisito obligatorio',
        'observacion.required'=>'La :atribute es obligatoria',
        'fkTipoRequisito.required'=>'El Tipo De Requisito es obligatorio',
         'fkGradoFormacion.required'=>'El Grado Formacion es obligatorio',
         'fkEstadoRequisito.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            'nombrerequisito' =>'required',
            'observacion' =>'required',
            //'archivoadjunto'=>'required',
            'fkTipoRequisito'=>'required',
            'fkGradoFormacion'=>'required',
            'fkEstadoRequisito'=>'required'
            ],$mesaje);

        $requisito= Requisito::find($request->id);
        $requisito->nombrerequisito=$request->nombrerequisito;
        $requisito->observacion=$request->observacion;
        $requisito->archivoadjunto=$request->archivoadjunto;
        $requisito->fkTipoRequisito=$request->fkTipoRequisito;
        $requisito->fkGradoFormacion=$request->fkGradoFormacion;
        $requisito->fkEstadoRequisito->fkEstadoRequisito;
        $requisito->save();
        return redirect('requisito');
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   }
    public function destroy($id)
    {
        //
    }
    public function search(Request $Request)
    {

        $requisito=   Requisito::where('nombrerequisito','like','%'.$request->nombrerequisito.'%')-> select('requisitos.*','tiporequisitos.nombre','grado_formacions.codigo','estado_requisitos.nombre')
        ->join('tiporequisitos','tiporequisitos.id','=','requisitos.fkTipoRequisito')
        ->join('grado_formacions','grado_formacions.id','=','requisitos.fkGradoFormacion')
        ->join('estado_requisitos','estado_requisitos.id','=','requisitos.fkEstadoRequisito')
        ->paginate(5);

        return \View::make('Requisitos\listarequisitos',compact('requisito'));



    }
}
