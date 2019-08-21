<?php

namespace App\Http\Controllers;
use App\Models\DetAprendizSeguimiento as DetAprendizSeguimiento;

use Illuminate\Http\Request;

use App\Http\Requests;

class DetAprendizSeguimientoController extends Controller
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
        $DetAprendizSeguimiento = DetAprendizSeguimiento::all();
        return \View::make('listdetalleaprendizseguimiento',compact('det_aprendiz_seguimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return \View::make('newdetalleaprendizseguimineto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $DetAprendizSeguimiento=new DetAprendizSeguimiento;
        $DetAprendizSeguimiento-> create($request->all());
        return redirect('detaprendizseguimiento');
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
    public function edit($idDetalleAprendizSeguimiento)
    {
        /   $DetAprendizSeguimiento = DetAprendizSeguimiento::find($idDetalleAmbienteActa);
        return \View::make('update',compact('idDetalleAprendizSeguimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDetalleAprendizSeguimiento)
    {
             $DetAprendizSeguimiento = DetAprendizSeguimiento::find($request->idDetalleAprendizSeguimiento);
        $DetAprendizSeguimiento-> autoseguimiento = $request->autoseguimiento;
        $DetAprendizSeguimiento-> fecha = $request->fecha;
        $DetAprendizSeguimiento-> fkAprendiz = $request->fkAprendiz;
        $DetAprendizSeguimiento-> fkSeguimiento = $request->fkSeguimiento;

        $DetAprendizSeguimiento-> save();
        return redirect('detaprendizseguimiento');
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

        //Funcion para crear consultas sql//
     public function search(Request $request)
     {
       $DetAprendizSeguimiento = DetAprendizSeguimiento::where('created_at','>','date',->get();
        DetAprendizSeguimiento = DetAprendizSeguimiento::where('created_at','<','date',->get();

       return \View::make('listdetaprendizseguimiento',compact('detaprendizseguimiento'));
     }
}
