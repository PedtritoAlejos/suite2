$(document).ready(function () {
    //editamos datos del usuario
    $(".editar_sist").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();


        document.getElementById("id_sistema").value = id;
        alert('Eligio el sistema '+nombre);
    });

    //editamos datos del usuario
    $(".editar_alert").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();
        var descripcion = $("#descripcion" + id).html();
  
        
        $("<div class='edit_modal'>\n\
<form name='edit' id='edit' method='post' action='http://localhost/suite/index.php/c_alerta/multi_alert'>" +
                "<label>Nombre</label><input style='color: black;' type='text' name='nombre'  class='nombre' value='" + nombre + "' id='nombre' /><br/>" +
                "<input type='hidden' name='id' class='id' id='id' value=" + id + ">" +
                "<label>Descripcion</label><input style='color: black;' type='text' name='descripcion_e'  class='nombre' value='" + descripcion + "' id='descripcion_e' /><br/>" +
              
                "</form><div class='respuesta'></div></div>").dialog({
            resizable: false,
            title: 'Editar alerta.',
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

                            $("<div class='edit_modal'>La alerta fué editada correctamente</div>").dialog({
                                resizable: false,
                                title: 'Alerta editada.',
                                height: 200,
                                width: 450,
                                modal: true

                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_alerta";
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

    $(".eliminar_alert").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();
        //alert(id + 'eso' + nombre);
        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar la alerta "+nombre+" ?</div>").dialog({
            resizable: false,
            title: 'Eliminar al alerta .',
            height: 200,
            width: 450,
            modal: true,
            buttons: {
                "Eliminar": function () {
                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/suite/index.php/c_alerta/delete_alert',
                        async: true,
                        data: {id: id},
                        complete: function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>La alerta fué eliminada correctamente</div>").dialog({
                                resizable: false,
                                title: 'Alerta eliminada.',
                                height: 200,
                                width: 450,
                                modal: true
                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_alerta";
                            }, 2000);

                        }, error: function (error) {

                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable: false,
                                title: 'Error eliminando la alerta!.',
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

