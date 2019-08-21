<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entidad As Entidad;
use App\Models\ProgramaFormacion As ProgramaFormacion;
use App\Models\Ficha As Ficha;
use App\Models\Ambiente As Ambiente;
use App\Models\Area As Area;
use App\Models\CentroFormacion As CentroFormacion;
use App\Models\Ciudad As Ciudad;
use App\Models\EstadoRequisito As EstadoRequisito;
use App\Models\Requisito As Requisito;
use App\Models\GradoFormacion As GradoFormacion;
use App\Models\Aprendiz As Aprendiz;
use App\Models\Agenda As Agenda;
use App\Models\Empleado As Empleado;
use App\Models\Acta As Acta;
use App\Models\Invitados As Invitados;
use App\Models\Compromisos As Compromisos;
use App\Models\Asistentes As Asistentes;
use App\Models\TipoActa As TipoActa;
use App\Models\Bitacora As Bitacora;
use App\Models\Actividades As Actividades;
use App\Models\pdf as pdf;
use App\Models\Estado As Estado;
use App\Models\TipoDocumento As TipoDocumento;
use App\User As User;
use DB;
 



class pdfController extends Controller
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
        $empleado = Empleado::select('empleados.*')
        ->where('empleados.fkuser','=',\Auth::user()->id)
        ->get();

        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::lists('nombreestado','id');
        $user = User::lists('name','id');
        $tipodocumento = TipoDocumento::lists('descripcion','id');
        $centro = CentroFormacion::lists('nombrecentro','id');      
        $estado = Estado::lists('nombreestado','id');
        $user = User::lists('name','id');
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();  
        $pdfs = pdf::paginate(6);
        return view("Reportes/listado_reportes", compact('empleado','pdfs','rolsEmpleado','empleado','tipodocumento','centro','estado','user'));
    }
    //creo la funcion que me crea el pdf
      public function crearPDF($datos,$vistaurl,$tipo)
    {   // esta variable me envia los datos a la vista   
        $data = $datos;
        //envia la fecha y hora 
        $date = date('d-m-Y H:i:s');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
       /* $pdf->setPaper('A4','landscape');*/
        //tipos de pdf que se general ya sea para ver en linea o descargar
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }

//REPORTE DE FICHA
    public function crear_reporte_por_ficha($tipo){

     $vistaurl="Reportes/reporte_por_ficha";//url del reporte
     $fichas=Ficha::select('fichas.numero','programa_formacions.nombreprograma','entidads.nombreentidad')//llamo la tabla fuerte de la que parte el reporte y traigo los datos que necesito para completar la consulta
                     ->join('programa_formacions','programa_formacions.id','=','fichas.fkPrograma')// hago la union de las tablas
                     ->join('entidads','entidads.id','=','fichas.fkEntidad')
                     ->get();//ejecuta la consulta
     
     return $this->crearPDF($fichas, $vistaurl,$tipo);
    }
//REPORTE DE Entidades y ambientes
   public function crear_reporte_por_ambiente($tipo){

     $vistaurl="Reportes/reporte_por_ambiente";
     $ambientes=Ambiente::select('ambientes.nombreambiente','estados.nombreestado','entidads.nombreentidad')
                     ->join('estados','estados.id','=','ambientes.fkEstado')
                     ->join('entidads','entidads.id','=','ambientes.fkEntidad')
                     ->get();
      return $this->crearPDF($ambientes, $vistaurl,$tipo);
    }
//REPORTE DE programa
    public function crear_reporte_por_programa($tipo){

     $vistaurl="Reportes/reporte_por_programa";
     $programa_formacions=ProgramaFormacion::select('programa_formacions.nombreprograma','areas.nombrearea','grado_formacions.nombregrado')
                     ->join('areas','areas.id','=','programa_formacions.fkArea')
                     ->join('grado_formacions','grado_formacions.id','=','programa_formacions.fkGrado')
                     ->get();
      return $this->crearPDF($programa_formacions, $vistaurl,$tipo);
    }
   
   //REPORTE DE aprendiz
   public function crear_reporte_por_aprendiz($tipo){

     $vistaurl="Reportes/reporte_por_aprendiz";
     $aprendiz=Aprendiz::select('aprendizs.id','aprendizs.nombreaprendiz','aprendizs.apellido','estado_aprendizs.nombreestado','fichas.numero','entidads.nombreentidad','programa_formacions.nombreprograma')
                     ->join('estado_aprendizs','estado_aprendizs.id','=','aprendizs.fkEstadoAprendiz')
                     ->join('fichas','fichas.id','=','aprendizs.fkFicha')
                     ->join('entidads','entidads.id','=','aprendizs.fkEntidad')
                     ->join('programa_formacions','programa_formacions.id','=','fichas.fkPrograma')
                     ->get();
      return $this->crearPDF($aprendiz, $vistaurl,$tipo);
    }

//reportepor agendamiento//
    public function crear_reporte_por_agendamiento($tipo){
    
     $vistaurl="Reportes/reporte_por_agendamiento";
     $agenda =Agenda::select('agendas.fechaasignacion','agendas.hora','estados.nombreestado','entidads.nombreentidad')
                     ->join('estados','estados.id','=','agendas.fkEstado')
                     ->join('entidads','entidads.id','=','agendas.fkEntidad')
                     ->get();
      return $this->crearPDF($agenda, $vistaurl,$tipo);
    }
    

    //reporte por visita//
    public function crear_reporte_por_visita($tipo){
    
     $vistaurl="Reportes/reporte_por_visita";
     $cantidad= Agenda::select(DB::raw('count(agendas.fkEmpleado) as empleado_count'), 'empleados.nombreempleado')
                        ->join('empleados', 'empleados.id' , '=' , 'agendas.fkEmpleado')
                        ->groupBy('empleados.nombreempleado')
                        ->get();
     
     return $this->crearPDF($cantidad, $vistaurl,$tipo);
    }
   

   //reporte por empleado//
     public function crear_reporte_por_empleado($tipo){
    
     $vistaurl="Reportes/reporte_por_empleado";
     $empleado =Empleado::select('empleados.id','empleados.nombreempleado','empleados.apellido','centro_formacions.nombrecentro','rols.nombrerol')
                        ->join('centro_formacions','centro_formacions.id','=','empleados.fkCentro')
                        ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                        ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                        ->get();
      return $this->crearPDF($empleado, $vistaurl,$tipo);
    }
    //acta en pdf//
    public function crear_acta($tipo){
    
     $vistaurl="Reportes/crear_acta";
     $acta =Acta::select('actas.*','tipo_actas.nombretipoacta','estados.nombreestado','compromisos.*','asistentes.*','invitados.*')
                    ->join('tipo_actas','tipo_actas.id','=','actas.fkTipoActa')
                    ->join('estados','estados.id','=','actas.fkEstado')
                    ->join('compromisos','actas.id','=','compromisos.fkacta')
                    ->join('asistentes','actas.id','=','asistentes.fkacta')
                    ->join('invitados','actas.id','=','invitados.fkacta')
                    
                    ->get();
      return $this->crearPDF($acta, $vistaurl,$tipo);
    }

    //bitacora en pdf//
    public function crear_bitacora($tipo){
    
     $vistaurl="Reportes/crear_bitacora";
     $bitacora =Bitacora::select('bitacoras.*','centro_formacions.nombrecentro','programa_formacions.nombreprograma','fichas.numero','tipo_documentos.descripcion','actividades.*')
                        ->join('centro_formacions','centro_formacions.id','=','bitacoras.fkCentro')
                        ->join('programa_formacions','programa_formacions.id','=','bitacoras.fkPrograma')
                        ->join('fichas','fichas.id','=','bitacoras.fkFicha')
                        ->join('tipo_documentos','tipo_documentos.id','=','bitacoras.fkTipoDoc')
                        ->join('actividades','bitacoras.id','=','actividades.fkBitacora')
                        //->where('acta.id','=',$id)
                        ->get();
      return $this->crearPDF($bitacora, $vistaurl,$tipo);
    }

    //reporte por  cantidad visitas entidad //
    public function crear_reporte_por_cantidad_visitas($tipo){
    
     $vistaurl="Reportes/reporte_por_cantidad_visitas";
     $cantidad= Agenda::select(DB::raw('count(agendas.fkEntidad) as entidad_count'), 'entidads.nombreentidad')
                        ->join('entidads', 'entidads.id' , '=' , 'agendas.fkEntidad')
                        ->groupBy('entidads.nombreentidad')
                        ->get();
     
     return $this->crearPDF($cantidad, $vistaurl,$tipo);
    }


    //reporte por  cantidad visitas entidad //
    public function crear_reporte_por_cantidad_ficha($tipo){
    
     $vistaurl="Reportes/reporte_por_cantidad_ficha";
     $cantidad= Aprendiz::select(DB::raw('count(aprendizs.fkFicha) as fichas_count'), 'fichas.numero')
                        ->join('fichas', 'fichas.id' , '=' , 'aprendizs.fkFicha')
                        ->groupBy('fichas.numero')
                        ->get();
     
     return $this->crearPDF($cantidad, $vistaurl,$tipo);
    }

    //reporte por  cantidad ambientes por entidad //
    public function crear_reporte_por_cantidad_ambiente($tipo){
    
     $vistaurl="Reportes/reporte_por_cantidad_ambiente";
     $cantidad= Ambiente::select(DB::raw('count(ambientes.fkEntidad) as ambientes_count'), 'entidads.nombreentidad')
                        ->join('entidads', 'entidads.id' , '=' , 'ambientes.fkEntidad')
                        ->groupBy('entidads.nombreentidad')
                        ->get();
     
     return $this->crearPDF($cantidad, $vistaurl,$tipo);
    }





}