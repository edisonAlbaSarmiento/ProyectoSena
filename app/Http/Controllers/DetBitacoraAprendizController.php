<?php

namespace App\Http\Controllers;
use App\Models\DetBitacoraAprendiz as DetBitacoraAprendizs;

use Illuminate\Http\Request;

use App\Http\Requests;

class DetBitacoraAprendizController extends Controller
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
         $DetBitacoraAprendiz = DetBitacoraAprendiz::all();
        return \View::make('listdetbitacoraaprendiz',compact('det_bitacora_aprendizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return \View::make('newdetbitacoraaprendiz');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $DetBitacoraAprendiz=new DetBitacoraAprendiz;
         $DetBitacoraAprendiz->create($request->all());
         return redirect('DetBitacoraAprendiz');
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
    public function edit($idDetalleBitacoraAprendiz)
    {
       
         $DetBitacoraAprendiz=DetBitacoraAprendiz::find($idDetalleBitacoraAprendiz);
        return \View::make('update',compact('DetBitacoraAprendiz'));

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $DetBitacoraAprendiz = Ciudad::find($request->idCiudad);
        $DetBitacoraAprendiz-> fecha = $request->fecha;
        $DetBitacoraAprendiz-> fkAprendiz = $request->fkAprendiz;
        $DetBitacoraAprendiz-> fkBitacora = $request->fkBitacora;
        $DetBitacoraAprendiz-> save();
        return redirect('detbitacoraaprendiz');
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

       public function search(Request $Request)
    {
        //busca el nombre exactamente igual a la variable 
        $DetBitacoraAprendiz=DetBitacoraAprendiz::where('fecha','=',.$request->fecha)->get();


            return \View::make('listdetbitacoraaprendiz',compact('det_bitacora_aprendizs'));



    }

}
