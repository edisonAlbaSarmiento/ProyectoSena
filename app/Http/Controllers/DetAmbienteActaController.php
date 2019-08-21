<?php

namespace App\Http\Controllers;
use App\Models\DetAmbienteActa as DetAmbienteActa;


use Illuminate\Http\Request;

use App\Http\Requests;

class DetAmbienteActaController extends Controller
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
          $DetAmbienteActa = DetAmbienteActa::all();
        return \View::make('listdetambienteactas',compact('det_aprendiz_seguimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('newdetalleambienteacta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $DetAmbienteActa=new DetAmbienteActa;
        $DetAmbienteActa-> create($request->all());
        return redirect('detambienteacta');
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
    public function edit($idDetalleAmbienteActa)
    {
         $DetAmbienteActa = DetAmbienteActa::find($idDetalleAmbienteActa);
        return \View::make('update',compact('idDetalleAmbienteActa'));
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
           $DetAmbienteActa = DetAmbienteActa::find($request->idDetAmbienteActa);
        $DetAmbienteActa-> fkAmbiente = $request->fkAmbiente;
        $DetAmbienteActa-> fkActa = $request->fkActa;
        $DetAmbienteActa-> fkAmbiente = $request->fkAmbiente;
        $DetAmbienteActa-> save();
        return redirect('detambienteacta');
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
       //Funcion para crear consultas sql//
     public function search(Request $request)
     {
       $DetAmbienteActa = DetAmbienteActa::where('fkAmbiente','like','%'.$request->fkAmbiente.'%')->get();
       return \View::make('listdetambienteactas',compact('det_ambiente_actas'));
     }
}
