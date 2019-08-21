<?php

namespace App\Http\Controllers;
use App\Models\Seguimiento As Seguimiento;

use App\Models\Estado As Estado;

use Illuminate\Http\Request;

use App\Http\Requests;

class SeguimientoController extends Controller
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
          $seguimiento = Seguimiento::select('seguimientos.*','estados.nombreestado')
         ->join('estados','estados.id','=','seguimientos.fkEstado')
          ->paginate(5);

          return \View::make('Seguimiento/listaseguimiento',compact('seguimiento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::lists('nombreestado','id');
        return \View::make('Seguimiento/newseguimiento', compact('estado'));  
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
         'fkEstado.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            //'archivoadjunto'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);

        $seguimiento=new Seguimiento;
        $seguimiento->create($request->all());
         return redirect('seguimiento');
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
        $seguimiento = Seguimiento::find($id);
        return \View::make('Seguimiento/updateseguimiento',compact('seguimiento','estado'));
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
         'fkEstado.required'=>'El Estado es obligatorio'
        ];
            $this->validate($request,[
            //'archivoadjunto'=>'required',
            'fkEstado'=>'required'
            ],$mesaje);
        $seguimiento= Seguimiento::find($request->id);
        $seguimiento->archivoadjunto=$request->archivoadjunto;
        $seguimiento->fkEstado=$request->fkEstado;
        $seguimiento->save();
         return redirect('seguimiento');
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
      ///fuincion de buscar
        //creamos una consulta y una variable para recoger la informacion  
        $seguimiento = Seguimiento::where('fkEstado','like','%'.$request->fkEstado.'%')->select('seguimientos.*','estados.nombreestado')
         ->join('estados','estados.id','=','seguimientos.fkEstado')
          ->paginate(5);
        
        return \View::make('Seguimiento/listaseguimiento',compact('seguimiento'));



    }
    
}

