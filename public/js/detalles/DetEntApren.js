var cantidad = 0;
var cantidadt=0;
/*var cantidads=0;*/
var enti= new Array();
var titulo = new Array();
/*var seguimiento = new Array();*/

$(document).ready(function()
{
    /*Evento JQUERY para evitar accion del boton submit*/
    $("#formNewEntrada").submit(function(e)
    {
        e.preventDefault();
    });

    
//Para Validar que no se puedan ingresar dos veces
    $("#btnAdd").click(function()
    {
        var id = $("#selectenti").val();
        var nombreenti = $("#selectenti").find("option:selected").text();    
        //var entiR = $("#entiR").val();

        if($("#Hi" + id).val() != id)
        {
       $("#cargaDetalle").append('<tr id="tr' + id + '"> <input type="hidden" id="Hi' + id + '" value="' + id + '"> <td>' + id + '</td> <td><td>'+ nombreenti +'</td><td> <button onClick="borrarFila(' + id + ')" class"btn btn-danger">X</button> </td> </tr>');
            enti[cantidad] = id;
            cantidad++;
        }
        else
        {
            alert("entidad ya esta registrado");
        }
    });
     $("#btnAddt").click(function()
    {
        var id = $("#selecttitulo").val();
        var nombretitulo = $("#selecttitulo").find("option:selected").text();    
        //var entiR = $("#entiR").val();

        if($("#Hit" + id).val() != id)
        {
       $("#cargaDetallet").append('<tr id="tr' + id + '"> <input type="hidden" id="Hit' + id + '" value="' + id + '"> <td>' + id + '</td> <td><td>'+ nombretitulo +'</td><td> <button onClick="borrarFila(' + id + ')" class"btn btn-danger">X</button> </td> </tr>');
            titulo[cantidadt] = id;
            cantidadt++;
        }
        else
        {
            alert("Titulo ya esta registrado");
        }
    });
     /* $("#btnAdds").click(function()
    {
        var id = $("#selectseguimiento").val();
        var nombretitulo = $("#selectseguimiento").find("option:selected").text();    
        //var entiR = $("#entiR").val();

        if($("#Hit" + id).val() != id)
        {
       $("#cargaDetallet").append('<tr id="tr' + id + '"> <input type="hidden" id="Hit' + id + '" value="' + id + '"> <td>' + id + '</td> <td><td>'+ nombreseguimiento +'</td><td> <button onClick="borrarFila(' + id + ')" class"btn btn-danger">X</button> </td> </tr>');
            seguimiento[cantidads] = id;
            cantidads++;
        }
        else
        {
            alert("entidad ya esta registrado");
        }
    });*/

//Al hacer click en el boton se registra la peticion ajax 

    $("#btnRegistrarenti").click(function()
    {
        event.preventDefault();

        var nombreaprendiz = $("#nombreaprendiz").val();
        var apellido = $("#apellido").val();
        var fkTipoDoc = $("#fkTipoDoc").val();
        var identificacion = $("#identificacion").val();
        var correo = $("#correo").val();
        var telefonocelular = $("#telefonocelular").val();
        var telefonofijo = $("#telefonofijo").val();
        var direccion = $("#direccion").val();
        var fkEstadoAprendiz = $("#fkEstadoAprendiz").val();
        var fkModalidad = $("#fkModalidad").val();
        var fkFicha = $("#fkFicha").val();
        var fkEntidad = $("#fkEntidad").val();
        var fkuser = $("#fkuser").val();
        var tokenNewEntrada = $("#tokenNewEntrada").val();

        $.ajax(
        {
            type: 'post',
            url: '/aprendiz/store',
            headers: {'X-CSRF-TOKEN': tokenNewEntrada},
            data: {nombreaprendiz, apellido, fkTipoDoc, identificacion,correo,  telefonocelular,telefonofijo,direccion,  fkEstadoAprendiz,fkModalidad,fkFicha,fkEntidad, fkuser,cantidad,enti,titulo,cantidadt},
            success:function(resp)
            {
           if(resp!=null)
           {
            window.location.href="/aprendiz";   
            }

            else{

                alert("no se realizo la accion");
            }
        }
        });
    });

});

function borrarFila(id)
{
    $("#tr" + id).remove();
    cantidad--;
}
