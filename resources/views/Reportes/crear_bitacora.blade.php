<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bitacora</title>
<style>

*
{
  font-family: sans-serif;
}

.box-header {
    color: white;
    display: block;
    padding: 5% 3% 0% 5%;
    margin-left: 16.5px;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}

.box-header 
.box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px; 
    padding: 2% 0% 2% 0%;   

}



.table-bordered {
    border: 2px  #26a69a;
}


.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    margin-top: 1%;
}
table {
   background-color: transparent;
   font-size: 15px;   
   margin: 45px;    
   margin-top: 1.8%;
   width: 480px; text-align: left;   
   border-collapse: collapse;
   border: red 5px solid;
   font-family: arial;
   page-break-before:auto;


}


#letra{
  font: Arial;
  border-bottom: 1px solid #26a69a;
  margin-top: 20%;
  
}

body{
  background: url('../../public/image/marca.png') no-repeat; 
  padding: -5%;
}

#main-header {
  background:url('../../public/image/hola.png') no-repeat;
  width: 100%;
  height: 10%;  


} 
  #main-header a {
    color: white;
  }

footer{
  width: 100%;
  height: 50px;
  border-top: 1px solid #000;
  position: absolute;
  bottom: 0;
 
}
p{
  margin-left: 70%;
  margin-top: 1.8%;
 
}
h3{
  margin-top: -1%;
  font: oblique 120% sans-serif bold;
  
}

 .table-bordered>tbody>tr>t,
 .table-bordered>tfoot>tr>th,
 .table-bordered>thead>tr>td, 
 .table-bordered>tbody>tr>td,
 .table-bordered>tfoot>tr>td 
 {
  border: 1px solid #000;
}

.center, .center-align {
  text-align: center;
}

#trApoyo
{
 padding: 5% 5% 5% 5%;
}
#color{
  background: #CCD1D1;
}
</style>
</head>
<body>
<div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                   <header id="main-header"></header>
                </div><!-- /.box-header -->
                        <div class="box-body">
                          <div style="page-break-after: always;">
                              <table class="table table-bordered center">
                                  <caption>1.INFORME GENERAL</caption>
                                     <thead>
                                        <?php foreach($data as $bitacora){ ?><!-- ciclo para la carga de los datos-->
                                           <tr>
                                              <td id="color">Regional:</td><td><?= $bitacora->regional; ?></td>
                                              <td id="color">Centro De Formacion:</td><td><?= $bitacora->nombrecentro;?></td>
                                            </tr>
                                              
                                            <tr>
                                              <td id="color">Programa De Formacion:</td><td><?= $bitacora->nombreprograma;?></td>
                                              <td id="color"> No. De Ficha</td><td><?= $bitacora->numero;?></td>
                                           </tr>
                                      </thead>
                              </table>

                                 
                              <table class="table table-bordered ">
                                      <thead>
                                           <tr>
                                              <td id="color" rowspan="6"><center>Datos Del Aprendiz</center></td>
                                              <td id="color">Nombre:</td>
                                              <td><center><?= $bitacora->nombreaprendiz; ?><center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Apellido:</td>
                                              <td><center><?= $bitacora->apellido;?></center></td>
                                            <tr>
                                              <td id="color">Tipo Documento:</td>
                                              <td><center><?= $bitacora->descripcion;?></center></td>
                                             </tr>
                                            <tr>
                                              <td id="color">Identificacion:</td>
                                              <td><center><?= $bitacora->identificacion;?></center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Telefono:</td>
                                              <td><center><?= $bitacora->telefonoaprendiz; ?></center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">E-mail:</td>
                                              <td><center><?= $bitacora->correo;?></center></td>
                                            </tr>
                                      </thead>
                          </table>
                                
                             <table class="table table-bordered ">                
                                      <thead>
                                            <tr>
                                              <td id="color" rowspan="7" scope="col"><center>Ente Conformador</center></td>
                                              <td id="color">Razon social:</td>
                                              <td><center><?= $bitacora->razonsocial;?></center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Direccion:</td>
                                              <td><center><?= $bitacora->direccionempresa;?></center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Cedula o NIT:</td>
                                              <td><center><?= $bitacora->nit; ?></center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Nombre del Conformador responsable:</td>
                                              <td><center><?= $bitacora->nombreresponsable;?><center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Cargo:</td>
                                              <td><center><?= $bitacora->cargo;?></center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Telefono:</td>
                                              <td><center><?= $bitacora->telefonoempresa; ?></center></td>
                                            </tr>
                                            <tr>
                                              <td id="color">E-mail</td>
                                              <td><center><?= $bitacora->emailempresa; ?></center></td>
                                            </tr>
                                      </thead>
                              </table>

                                  <caption>2.PLANEACION ETAPA PRODUCTIVA</caption>
                              <table class="table table-bordered center">       
                                      <thead >
                                            <tr>
                                              <td id="color">ALTERNATIVAS PARA EL DESARROLLO DE LA ETAPA PRODUCTIVA</td>
                                              <td id="color">Marque con una(x) la opcion seleccionada por el aprendiz</td>
                                            </tr>
                                            <tr>
                                             <td>Contrato de aprendizaje</td><td></td>
                                             </tr>
                                             <tr>
                                             <td>Vinculacion laboral o contractual</td><td></td>
                                             </tr>
                                             <tr>
                                             <td>Participacion en un proyecto productivo en SENA,Empresa, en SENA proveedor o en Produccion de Centros</td><td></td>
                                             </tr>
                                             <tr>
                                             <td>Apoyo a una unidad productiva familiar</td><td></td>
                                             </tr>
                                             <tr >
                                             <td>Monitorias</td><td></td>
                                             </tr>                                             
                                             <tr>                                            
                                             <td>Apoyo a una institucion estatal, nacional o territorial, a una ONG o a una entidad sin animo de lucro</td><td></td>
                                             </tr>
                                             <tr>
                                             <td>Pasantias</td><td></td>
                                            </tr>
                                      </thead>
                              </table>
                              <br>
                              
                              <table class="table table-bordered">                 
                                      <thead>
                                            <tr>
                                              <td colspan="4" id="color"><center>CONCERTACIÓN PLAN DE TRABAJO DE LA ETAPA PRODUCTIVA</center></td>
                                            </tr>
                                            <tr>
                                              <td id="color" rowspan="2"><center>Actividad</center></td>
                                              <td id="color" rowspan="2"><center>Evidencias</center></td>
                                              <td id="color" colspan="2"><center> Recoleccion De Evidencias</center></td>
                                            </tr>
                                      </thead>
                                          <tbody>
                                                <tr>
                                                    <td id="color"><center>Fecha</center></td>
                                                    <td id="color"><center>Lugar</center></td>
                                                  </tr>
                                                  <tr>
                                                    <td><center><?= $bitacora->actividad;?></center></td>
                                                    <td><center><?= $bitacora->evidencias; ?></center></td>
                                                    <td><center><?= $bitacora->fecha;?></center></td>
                                                    <td><center><?= $bitacora->lugar;?></center></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">Observaciones:</td>
                                                </tr>
                                          </tbody>
                             </table>
</div>
                             <br>
                             <br>
                             
                             <div class="box-header with-border">
                           <header id="main-header"></header>
                           </div>
                             <div style="page-break-after: always;">
                             <caption>3.SEGUIMIENTO Y EVALUACION DE LA ETAPA PRODUCTIVA</caption>
                             <table class="table table-bordered">                 
                                      <thead>
                                            <tr>
                                              <td id="color" rowspan="2" scope="col"><center>TIPO DE INFORME</center></td>
                                              <td colspan="1" scope="col">Parcial</td>
                                            </tr>
                                            <tr>
                                              <td scope="col">Final</th>
                                            </tr>
                                             <tr>
                                              <td id="color" rowspan="2" scope="col"><center>PERIODO EVALUADO</td>
                                              <td colspan="1" scope="col">Inicio:</td>
                                            </tr>
                                            <tr>
                                              <td scope="col"><center>Finalizacion:</center></th>
                                            </tr>
                                      </thead>
                              </table>
                             <table class="table table-bordered">
                                      <thead>
                                            <tr>
                                              <td colspan="2" id="color"><center>VALORACION ETAPA PRODUCTIVA</center></td>
                                            </tr>
                                            <tr>
                                              <td rowspan="2" scope="col" ><center>Juicio De Evaluacion:</center></td>
                                               <td colspan="1" scope="col">Aprobado:</td>
                                            </tr>
                                            <tr>
                                              <td scope="col">No Aprobado</th>
                                            </tr>
                                            <tr>
                                               <td rowspan="2" scope="col"><center>Requiere Plan De Mejoramiento:</center></td>
                                               <td colspan="1" scope="col">Si:</td>
                                            </tr>
                                            <tr>
                                              <td scope="col">No:</th>
                                            </tr>
                                            <tr>
                                              <td rowspan="2" scope="col"><center>Reconocimientos Especiales Sobre El Desempeño:</center></td>
                                              <td colspan="1" scope="col">Si:</td>
                                             </tr>
                                            <tr>
                                              <td scope="col">No:</th>
                                            </tr>
                                            <tr>
                                             <td colspan="2">Especificar Cuales:<br><br><br></td>
                                            </tr>
                                            <tr>
                                             <td colspan="2">Nombre y Firma Del Ente Conformador:</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Firma Del Aprendiz:</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Nombre y Firma Funcionario SENA:</td>
                                            </tr>
                                            <tr>
                                             <td colspan="2">Fecha y Ciudad De Elaboracion:</td>
                                            </tr>
                                          </thead>
                                </table>
                                </div>

                                <div class="box-header with-border">
                           <header id="main-header"></header>
                           </div>
                             <div style="page-break-after: always;">
                             <table class="table table-bordered center">
                                      <thead>
                                            <tr>
                                              <td colspan="5" id="color"><center>FACTORES ACTITUDINALES Y COMPORTAMENTALES</center></td>
                                            </tr>
                                            <tr>
                                              <td id="color" rowspan="2">Variable</td>
                                              <td id="color" rowspan="2">Descripcion</td>
                                              <td id="color" colspan="2">Valoracion</td>
                                              <td id="color" rowspan="2">Observaciones</td>
                                            </tr>
                                            <tbody>
                                            <tr>
                                              <td id="color">Satisfactorio</td>
                                              <td id="color">Por Mejorar</td>
                                            </tr>
                                            <tr>
                                              <td id="color">Relaciones Interpersonales</td>
                                              <td >Desarrolla relaciones interpersonales con  las personas de los diferentes niveles del ente Coformador en forma armoniosa, respetuosa  y enmarcada dentro de los principios de convivencia social.</td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Trabajo En Equipo</td>
                                              <td>Participa en forma activa y propositiva  en equipos de trabajo asumiendo los roles, de acuerdo con sus fortalezas.</td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Solucion De Problemas</td>
                                              <td>Propone alternativas de solución a situaciones problémicas, en el contexto del desarrollo de su etapa productiva. </td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Cumplimiento</td>
                                              <td>Asume compromiso de las funciones y responsabilidades asignadas en el desarrollo de su trabajo.</td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td id="color">Organizacion</td>
                                              <td>Demuestra capacidad para ordenar y disponer los elementos necesarios e información para facilitar la ejecución de un trabajo y el logro de los objetivos.</td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                            </tr>
                                            </tbody>
                                         </thead>
                                </table>

                                </div>
                                <div class="box-header with-border">
                                 <header id="main-header"></header>
                              </div>
                                <div style="page-break-after: always;">
                               <table class="table table-bordered center">
                                      <thead>
                                            <tr>
                                              <td id="color" colspan="5"><center>FACTORES TECNICOS</center></td>
                                            </tr>
                                             <tr>
                                              <td id="color" rowspan="2">Variable</td>
                                              <td id="color" rowspan="2">Descripcion</td>
                                              <td id="color" colspan="2">Valoracion</td>
                                              <td id="color" rowspan="2">Observaciones</td>
                                            </tr>
                                            <tbody>
                                            <tr>
                                              <td id="color">Satisfactorio</td>
                                              <td id="color">Por Mejorar</td>
                                            </tr>
                                             <tr>
                                                <td id="color">Trasferencia De Conocimientos</td>
                                                <td>Demuestra las competencias específicas del programa de formación en situaciones reales de trabajo. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td id="color">Mejora Continua</td>
                                                <td>Aporta al mejoramiento de los procesos propios de su desempeño.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td id="color">Foralecimiento Ocupacional</td>
                                                <td>Autogestiona acciones que fortalezca su perfil ocupacional en el marco de su proyecto de vida.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td id="color">Oportunidad y Calidad</td>
                                                <td>Presenta con oportunidad y calidad  los productos generados en el  desarrollo de sus funciones y actividades.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td id="color">Responsabilidad Ambiental</td>
                                                <td>Administra los recursos para el desarrollo de sus actividades con criterios de responsabilidad ambiental.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td id="color">Responsabilidad Ambiental</td>
                                                <td>Administra los recursos para el desarrollo de sus actividades con criterios de responsabilidad ambiental.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                             <tr>
                                                <td id="color">Administracion De Recursos</td>
                                                <td>Utiliza de manera racional los materiales, equipos y herramientas suministrados para el desempeño de sus actividades o funciones.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                             <tr>
                                                <td id="color">Seguridad Ocupacional e Industrial</td>
                                                <td>Utiliza   los elementos de seguridad  y salud ocupacional de acuerdo con la normatividad vigente establecida para sus actividades o funciones.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                              <tr>
                                                <td id="color">Documentacion Etapa Productiva</td>
                                                <td>Utiliza   los elementos de seguridad  y salud ocupacional de acuerdo con la normatividad vigente establecida para sus actividades o funciones.Actualiza permanentemente el portafolio de evidencias.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">Observaciones del responsable ente  Coformador.  
                                                <br>
                                                <br>
                                               
                                                </td>
                                                <tr>
                                                <td colspan="5">Observaciones del Aprendiz:
                                                <br>
                                                <br>
                                                </td>
                                             </tr>
                                            </tbody>
                                        </thead>
                                </table>
                                </div>
                                <div class="box-header with-border">
                                 <header id="main-header"></header>
                              </div><
                               <div style="page-break-after: always;">
                                
                               <table class="table table-bordered">
                                      <thead>
                                            <tr>
                                              <td colspan="2" id="color"><center>VALORACION ETAPA PRODUCTIVA</center></td>
                                            </tr>
                                            <tr>
                                              <td rowspan="2" scope="col" ><center>Juicio De Evaluacion:</center></td>
                                               <td colspan="1" scope="col">Aprobado:</td>
                                            </tr>
                                            <tr>
                                              <td scope="col">No Aprobado</th>
                                            </tr>
                                            <tr>
                                               <td rowspan="2" scope="col"><center>Requiere Plan De Mejoramiento:</center></td>
                                               <td colspan="1" scope="col">Si:</td>
                                            </tr>
                                            <tr>
                                              <td scope="col">No:</th>
                                            </tr>
                                            <tr>
                                              <td rowspan="2" scope="col"><center>Reconocimientos Especiales Sobre El Desempeño:</center></td>
                                              <td colspan="1" scope="col">Si:</td>
                                             </tr>
                                            <tr>
                                              <td scope="col">No:</th>
                                            </tr>
                                            <tr>
                                             <td colspan="2">Especificar Cuales:<br><br><br></td>
                                            </tr>
                                            <tr>
                                             <td colspan="2">Nombre y Firma Del Ente Conformador:</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Firma Del Aprendiz:</td>
                                            </tr>
                                            <tr>
                                              <td colspan="2">Nombre y Firma Funcionario SENA:</td>
                                            </tr>
                                            <tr>
                                             <td colspan="2">Fecha y Ciudad De Elaboracion:</td>
                                            </tr>
                                          </thead>
                                </table>
                               
                       <?php  } ?><!--fin del ciclo-->
                        </div>
                        

          <footer>
            <p>{{ Auth::user()->name }} {{ Auth::user()->last }}  <?=  $date; ?><br></p><!--traigo la el nombre de usuario y la fecha con la variable del controlador-->
          </footer>
           
      </div>
  </body>
</html>


