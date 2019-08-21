<?php

namespace App\Http\Controllers;
use App\Models\Rol As Rol;


use Illuminate\Http\Request;

use App\Http\Requests;

class RolController extends Controller
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
        $rol=Rol::all();
        return \View::make('Rol/listrol',compact('rol')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return \View::make('Rol/newrol',compact('rol'));  
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
         'nombrerol.required'=>'El Nombre es obligatorio'
        ];
            $this->validate($request,[
            'nombrerol'=>'required'
            ],$mesaje);
         $rol=new Rol;
        $rol->create($request->all());
         return redirect('rol');
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
        $rol=Rol::find($id);
        return \View::make('Rol/updaterol',compact('rol'));  
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
         'nombrerol.required'=>'El Nombre es obligatorio'
        ];
            $this->validate($request,[
            'nombrerol'=>'required'
            ],$mesaje);
        $rol= Rol::find($request->id);
        $rol->nombrerol=$request->nombrerol;
        $rol->save();
         return redirect('rol');  
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
        //busca el nombre 

        $rol=Rol::where('nombrerol','like','%'.$request->nombrerol.'%')->paginate(5);
        return \View::make('Rol/listrol',compact('rol'));



    }
}
