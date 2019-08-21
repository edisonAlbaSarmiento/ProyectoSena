<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte Por Aprendiz</title>
<style>
 
 .col-md-12 {
    width: 100%;
} 


.box-header {
    color: white;
    display: block;
    padding: 10px;
    position: relative;
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
    padding: 10px;

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
   border-collapse: separate;
   font-size: 20px;   
   margin: 45px;    
   margin-top: 1.8%;
   width: 480px;
   text-align: left;   
   border-collapse: collapse;

}


#letra{
  font: 120% sans-serif bold;
  border-bottom: 1px solid #26a69a;
  margin-top: 20%;
  
}

body{
  background: url('../../public/image/marca.png') no-repeat; 
}

#main-header {
  background:url('../../public/image/2.jpg') no-repeat;
  width: 100%;
  height: 10%;

} 
  #main-header a {
    color: white;
  }

footer{
  width: 100%;
  height: 50px;
  border-top: 2px solid #26a69a;
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

</style>
	  
</head>
<body>

<div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <header id="main-header"></header>
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                 <br>
                  <br>

                  <h3><center><b>REPORTE POR APRENDIZ</center></h3>
                  <table class="table table-bordered">
                  <thead>
                     <tr>
                       <td id="letra"><center><b>Nombre </td>
                       <td id="letra"><center><b>Apellido</td>
                       <td id="letra"><center><b>Estado</td>
                       <td id="letra"><center><b>Ficha </td>
                       <td id="letra"><center><b>Entidad</td>
                       <td id="letra"><center><b>ProgramFormacion</td>
                    </tr>
                  </thead>
                    <tbody>
                  <?php foreach($data as $aprendiz){ ?>
                 
                    <tr>
                    <td><center><?= $aprendiz->nombreaprendiz;?></center></td>
                    <td><center><?= $aprendiz->apellido; ?></center></td>
                    <td><center><?= $aprendiz->nombreestado; ?></center></td>
                    <td><center><?= $aprendiz->numero; ?></center></td>
                    <td><center><?= $aprendiz->nombreentidad; ?></center></td>
                    <td><center><?= $aprendiz->nombreprograma; ?></center></td>
                    </tr>
                    
                    <?php  } ?>
                    
                  </tbody>

                  </table>
                </div><!-- /.box-body -->
               <footer>
                 <p>{{ Auth::user()->name }} {{ Auth::user()->last }}  <?=  $date; ?><br>
                        </p>
                 </footer>
              </div><!-- /.box -->

              
            </div>


	
</body>
</html>


