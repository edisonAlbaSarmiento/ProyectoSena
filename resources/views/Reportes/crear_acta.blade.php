<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Acta</title>
<style>

*
{
  font-family: sans-serif;
}

.box-header {
    color: white;
    display: block;
    padding: 5% 3% 0% 5%;
    margin-left: 10px;
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
    padding: 0% 0% 2% 0%;   

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
  background:url('../../public/image/hola1.png') no-repeat;
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
                  <table class="table table-bordered">
                  <thead>

                  <?php foreach($data as $acta){ ?><!-- ciclo para la carga de los datos-->
                 
                     <tr>
                     <td colspan="9" id="color"><center><br><?= $acta->nombretipoacta; ?><br><br></center></td>
                     </tr>
                     <tr>
                      <td>Fecha:<br><?= $acta->fecha;?></td>
                      <td>HoraInicio:<br><?= $acta->HoraInicio;?></td>
                      <td colspan="7">HoraFin:<br><?= $acta->HoraFin;?></td>
                     </tr>
                      <tr>
                      <td colspan="9">TEMAS:<br><?= $acta->temas; ?><BR><BR></td>
                     </tr>
                      <tr>
                      <td colspan="9">OBJETIVO(S) DE LA REUNIÓN:<br><?= $acta->objetivo;?><br><br></td>
                      </tr>
                      <tr>
                      <td id="color" colspan="9" ><center>DESARROLLO DE LA REUNIÓN</center></td>
                      </tr>
                      <tr>
                      <td colspan="9"><?= $acta->desarrolloreunion;?><br><br><br><br></center></td>
                      </tr>
                      <tr>
                      <td id="color" colspan="9"><center>CONCLUSIÓN</center></td>
                      </tr>
                      <tr>
                      <td colspan="9"><?= $acta->conclusion;?><br><br><br><br></td>
                      </tr>
                      <?php  } ?>
                      <?php foreach($data as $compromisos){ ?>
                      <tr>
                        <td colspan="9" id="color"><center>COMPROMISOS</center></td>
                      </tr>
                       <tr>
                        <td id="color"><center>ACTIVIDAD<br></center></td>
                        <td id="color"><center>RESPONSABLE<br></center></td>
                        <td id="color" colspan="7"><center>FECHA<br></center></td>
                      </tr>
                      <tr>
                        <td><center><?= $compromisos->Actividades;?></center></td>
                        <td><center><?= $compromisos->responsables;?></center></td>
                        <td colspan="7"><center><?= $compromisos->fecha;?></center></td>
                      </tr>
                      <?php  } ?>
                      <?php foreach($data as $asistentes){ ?>
                      <tr>
                      <td colspan="9" id="color"><center>ASISTENTES</center></td>
                      </tr>
                      <tr>
                        <td id="color"><center>NOMBRE<br></center></td>
                        <td id="color"><center>CARGO/DEPENDENCIA/ENTIDAD<br></center></td>
                        <td id="color" colspan="7"><center>FIRMA<br></center></td>
                      </tr>
                      <tr>
                         <td><center><?= $asistentes->nombreasistente; ?></center></td>
                         <td><center><?= $asistentes->cargodependenciaentidad;?></center></td>
                         <td colspan="7"><center></center></td>
                      </tr>
                      <?php  } ?>
                      <?php foreach($data as $invitados){ ?>
                      <tr>
                         <td id="color"  colspan="9"><center>INVITADOS (opcional)</center></td>
                      </tr>
                      <tr>
                        <td id="color"><center>NOMBRE INVITADO<br></center></td>
                        <td id="color"><center>CARGO<br></center></td>
                        <td id="color" colspan="7" ><center>ENTIDAD<br></center></td>
                     </tr>
                     <tr>
                     <td><center><?= $invitados->nombreinvitado;?></center></td>
                      <td><center><?= $invitados->cargo; ?></center></td>
                      <td colspan="7"><center><?= $invitados->entidad;?></center></td>
                    </tr>
                  
                    
                    <?php  } ?><!--fin del ciclo-->
                    
               

                  </table>
                </div><!-- /.box-body -->
                 <footer>
                 <p>{{ Auth::user()->name }} {{ Auth::user()->last }}  <?=  $date; ?><br><!--traigo la el nombre de usuario y la fecha con la variable del controlador-->
                        </p>
                 </footer>
              </div><!-- /.box -->

              
            </div>


  
</body>
</html>


