/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    //editamos datos del usuario
    $(".editar").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();
        var descripcion = $("#descripcion" + id).html();
        var observacion_final = $("#observacion_final" + id).html();

        
        $("<div class='edit_modal'>\n\
<form name='edit' id='edit' method='post' action='http://localhost/suite/index.php/c_proposito/multi_pro'>" +
                "<label>Nombre</label><input style='color: black;' type='text' name='nombre' class='nombre' value='" + nombre + "' id='nombre' /><br/>" +
                "<input type='hidden' name='id' class='id' id='id' value=" + id + ">" +
                "<label>Descripcion</label><textarea name='descripcion_e' style='color: black;' class='nombre'  id='descripcion_e' > " + descripcion + "</textarea><br/>" +
                "<label>Observacion final</label><textarea name='observacion_final_e' class='nombre' style='color: black;' id='observacion_final' > " + observacion_final + "</textarea><br/>" +
                "</form><div class='respuesta'></div></div>").dialog({
            resizable: false,
            title: 'Editar proposito.',
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

                            $("<div class='edit_modal'>El proposito fué editado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Proposito editado.',
                                height: 200,
                                width: 450,
                                modal: true

                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_proposito";
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


    //eliminamos datos del usuario
    $(".eliminar").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();

        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar al proposito " + nombre + "?</div>").dialog({
            resizable: false,
            title: 'Eliminar al proposito ' + nombre + '.',
            height: 200,
            width: 450,
            modal: true,
            buttons: {
                "Eliminar": function () {
                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/suite/index.php/c_proposito/delete_pro',
                        async: true,
                        data: {id: id},
                        complete: function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El proposito " + nombre + " fué eliminado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Proposito eliminado.',
                                height: 200,
                                width: 450,
                                modal: true
                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_proposito";
                            }, 2000);

                        }, error: function (error) {

                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable: false,
                                title: 'Error eliminando al proposito!.',
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
