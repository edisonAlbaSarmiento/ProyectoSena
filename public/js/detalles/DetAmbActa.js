var cantidad = 0;
var Ambiente= new Array();


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
        var id = $("#selectAmbiente").val();
        var nombreAmbiente = $("#selectAmbiente").find("option:selected").text();    
        //var AmbienteR = $("#AmbienteR").val();

        if($("#Hi" + id).val() != id)
        {
       $("#cargaDetalle").append('<tr id="tr' + id + '"> <input type="hidden" id="Hi' + id + '" value="' + id + '"> <td>' + id + '</td> <td><td>'+ nombreAmbiente +'</td><td> <button onClick="borrarFila(' + id + ')" class"btn btn-danger">X</button> </td> </tr>');
            Ambiente[cantidad] = id;
            cantidad++;
        }
        else
        {
            alert("Ambiente ya esta registrado");
        }
    });

//Al hacer click en el boton se registra la peticion ajax 

    $("#btnRegistrarAmbiente").click(function()
    {
        event.preventDefault();
        var fecha = $("#fecha").val();
        var fkTipoActa = $("#fkTipoActa").val();
        var descripcion = $("#descripcion").val();
        var HoraInicio = $("#HoraInicio").val();
        var HoraFin = $("#HoraFin").val();
        var temas = $("#temas").val();
        var objetivo = $("#objetivo").val();
        var desarrolloreunion = $("#desarrolloreunion").val();
        var conclusion = $("#conclusion").val();
        var archivoadjunto = $("#archivoadjunto").val();
        var fkEstado = $("#fkEstado").val();
        var tokenNewEntrada = $("#tokenNewEntrada").val();

        $.ajax(
        {
            type: 'post',
            url: '/acta/store',
            headers: {'X-CSRF-TOKEN': tokenNewEntrada},
            data: {fecha,fkTipoActa, descripcion, HoraInicio, HoraFin, temas, objetivo, desarrolloreunion, conclusion, archivoadjunto,fkEstado,cantidad,Ambiente},
            success:function(resp)
            {
           if(resp!=null)
           {
                window.location.href="/acta";   
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
    acta--;
}
