var cantidad = 0;
var cantidadt=0;
var rol= new Array();
var titulo = new Array();
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
        var id = $("#selectRol").val();
        var nombrerol = $("#selectRol").find("option:selected").text();    
        //var RolR = $("#RolR").val();

        if($("#Hi" + id).val() != id)
        {
       $("#cargaDetalle").append('<tr id="tr' + id + '"> <input type="hidden" id="Hi' + id + '" value="' + id + '"> <td>' + id + '</td> <td><td>'+ nombrerol +'</td><td> <button onClick="borrarFila(' + id + ')" class"btn btn-danger">X</button> </td> </tr>');
            rol[cantidad] = id;
            cantidad++;
        }
        else
        {
            alert("Rol ya esta registrado");
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

//Al hacer click en el boton se registra la peticion ajax 

    $("#btnRegistrar").click(function()
    {
        event.preventDefault();

        var nombreempleado = $("#nombreempleado").val();
        var apellido = $("#apellido").val();
        var fkTipoDoc = $("#fkTipoDoc").val();
        var identificacion = $("#identificacion").val();
        var direccion = $("#direccion").val();
        var telefonofijo = $("#telefonofijo").val();
        var telefonocelular = $("#telefonocelular").val();
        var correo = $("#correo").val();
        var fkCentro = $("#fkCentro").val();
        var tokenNewEntrada = $("#tokenNewEntrada").val();



        $.ajax(
        {
            type: 'post',
            url: '/empleado/store',
            headers: {'X-CSRF-TOKEN': tokenNewEntrada},
            data: {nombreempleado, apellido, fkTipoDoc, identificacion, direccion, telefonofijo, telefonocelular, correo, fkCentro,cantidad,rol,cantidadt,titulo},
            success:function(resp)
            {
           if(resp!=null)
           {
                //window.location.href="/empleado/store";   
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





//La parte de abajo tienen las alertas


/*
var cantidad = 0;
var cantidadt=0;
var rol= new Array();
var titulo = new Array();
$(document).ready(function()
{
    Evento JQUERY para evitar accion del boton submit
    $("#formNewEntrada").submit(function(e)
    {
        e.preventDefault();
    });

    
Para Validar que no se puedan ingresar dos veces
    $("#btnAdd").click(function()
    {
        var id = $("#selectRol").val();
        var nombrerol = $("#selectRol").find("option:selected").text();    
        //var RolR = $("#RolR").val();

        if($("#Hi" + id).val() != id)
        {
       $("#cargaDetalle").append('<tr id="tr' + id + '"> <input type="hidden" id="Hi' + id + '" value="' + id + '"> <td>' + id + '</td> <td><td>'+ nombrerol +'</td><td> <button onClick="borrarFila(' + id + ')" class"btn btn-danger">X</button> </td> </tr>');
            rol[cantidad] = id;
            cantidad++;
        }
        else
        {
            alert("Rol ya esta registrado");
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

Al hacer click en el boton se registra la peticion ajax 

    $("#btnRegistrar").click(function()
    {
        event.preventDefault();

        var nombreempleado = $("#nombreempleado").val();
        var apellido = $("#apellido").val();
        var fkTipoDoc = $("#fkTipoDoc").val();
        var identificacion = $("#identificacion").val();
        var direccion = $("#direccion").val();
        var telefonofijo = $("#telefonofijo").val();
        var telefonocelular = $("#telefonocelular").val();
        var correo = $("#correo").val();
        var fkCentro = $("#fkCentro").val();
        var rol = $("selectRol").val();
        var titulo = $("selecttitulo").val();
        var tokenNewEntrada = $("#tokenNewEntrada").val();



        $.ajax(
        {
            type: 'post',
            url: '/empleado/store',
            headers: {'X-CSRF-TOKEN': tokenNewEntrada},
            data: {nombreempleado, apellido, fkTipoDoc, identificacion, direccion, telefonofijo, telefonocelular, correo, fkCentro,rol,titulo},
            success:function(resp)
            {
           if(resp!=null)
           {
            Push.create("Nuevo Empleado",{
                        body:"Se creo un empleado con exito",
                        icon:'http://www.sena.edu.co/acerca-del-sena/quienes-somos/PublishingImages/logo_sena.jpg',
                        timeout:4000,
                    });
                window.location.href="/empleado";   
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
}*/
