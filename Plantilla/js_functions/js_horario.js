/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    //editamos datos del usuario
    $(".editar_aler").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();


        document.getElementById("alertaforan").value = id;
        alert('eligio la alerta '+nombre);
    });

    //editamos datos del usuario
    $(".editar_hora").on('click', function () {

        var id = $(this).attr('id');
        var minuto = $("#minuto" + id).html();
        var hora = $("#hora" + id).html();
        var dia_del_mes = $("#dia_del_mes" + id).html();
        var numero_mes = $("#numero_mes" + id).html();
        var anho = $("#anho" + id).html();
        var activo_ho = $("#activo_ho" + id).html();

        $("<div class='edit_modal'>\n\
<form name='edit' id='edit' method='post' action='"+base_url+"/index.php/c_horario/multi_hora'>" +
                "<label>minuto</label><input style='color: black;' type='text' name='minuto_e' maxlength='2' class='nombre' value=" + minuto + " id='minuto_e' /><br/>" +
                "<input type='hidden' name='id' class='id' id='id' value=" + id + ">" +
                "<label>hora</label><input style='color: black;' type='text' name='hora_e' maxlength='2' class='nombre' value='" + hora + "' id='hora_e' /><br/>" +
                "<label>Fecha</label><input style='color: black;' type='text' name='fechaf_e' class='nombre' value='" +  dia_del_mes+ "-"+numero_mes+"-"+anho+"' id='fechaf_e' /><br/>"    
                 +
           
                "<label>activo_ho</label><input style='color: black;' type='text' maxlength='1' name='activo_ho_e' class='nombre' value=" + activo_ho + " id='activo_ho_e' /><br/>" +
                "</form><div class='respuesta'></div></div>").dialog({
            resizable: false,
            title: 'Editar horario.',
            height: 300,
            width: 450,
            modal: true,
            buttons: {
                "Editar": function () {
                    $.ajax({
                        url: $('#edit').attr("action"),
                        type: $('#edit').attr("method"),
                        data: $('#edit').serialize(),
                        success: function (data) {
                            $('.edit_modal').dialog("close");

                            $("<div class='edit_modal'>El horario fué editado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Horario editado.',
                                height: 200,
                                width: 450,
                                modal: true

                            });

                            setTimeout(function () {
                                window.location.href = base_url+"/index.php/c_horario";
                            }, 2000);
                        }, error: function (error) {

                            $('.edit_modal').dialog("close");
                            $("<div class='edit_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable: false,
                                title: 'Error editando!.',
                                height: 200,
                                width: 450,
                                modal: true
                            });


                        }

                    });
                    return false;
                },
                Cancelar: function () {
                    $(this).dialog("close");
                }
            }
        });
    });

    $(".eliminar_hora").on('click', function () {

        var id = $(this).attr('id');
        //var nombre = $("#nombre" + id).html();
        //alert(id + 'eso' + nombre);
        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar al horario ?</div>").dialog({
            resizable: false,
            title: 'Eliminar al horario .',
            height: 200,
            width: 450,
            modal: true,
            buttons: {
                "Eliminar": function () {
                    $.ajax({
                        type: 'POST',
                        url: base_url+'/index.php/c_horario/delete_hora',
                        async: true,
                        data: {id: id},
                        complete: function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El horario  fué eliminado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Horario eliminado.',
                                height: 200,
                                width: 450,
                                modal: true
                            });

                            setTimeout(function () {
                                window.location.href = base_url+"/index.php/c_horario";
                            }, 2000);

                        }, error: function (error) {

                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable: false,
                                title: 'Error eliminando al horario!.',
                                height: 200,
                                width: 550,
                                modal: true

                            });

                        }

                    });
                    return false;
                },
                Cancelar: function () {
                    $(this).dialog("close");
                }
            }
        });
    });
});

