$(document).ready(function () {
    //editamos datos del usuario
    $(".editar_tipo").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();


        document.getElementById("id_tipo").value = id;
        alert('Eligio el tipo servicio '+nombre);
    });
    $(".editar_usu").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();


        document.getElementById("id_usu").value = id;
        alert('Eligio el usuario '+nombre);
    });
    $(".editar_cli").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();


        document.getElementById("id_cli").value = id;
        alert('Eligio el cliente '+nombre);
    });

    //editamos datos del usuario
    $(".editar_serv").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre_serv" + id).html();
        var descripcion = $("#descripcion" + id).html();
  
        
        $("<div class='edit_modal'>\n\
<form name='edit' id='edit' method='post' action='http://localhost/suite/index.php/c_servicio/multi_serv'>" +
                "<label>Nombre</label><input style='color: black;' type='text' name='nombre'  class='nombre_s' value='" + nombre + "' id='nombre_s' /><br/>" +
                "<input type='hidden' name='id' class='id' id='id' value=" + id + ">" +
                "<label>Descripcion</label><input style='color: black;' type='text' name='descripcion_e'  class='nombre' value='" + descripcion + "' id='descripcion_e' /><br/>" +
              
                "</form><div class='respuesta'></div></div>").dialog({
            resizable: false,
            title: 'Editar Servicio.',
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

                            $("<div class='edit_modal'>La servicio fué editado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Servicio editado.',
                                height: 200,
                                width: 450,
                                modal: true

                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_servicio";
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

    $(".eliminar_serv").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre_serv" + id).html();
        
        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar el servicio "+nombre+" ?</div>").dialog({
            resizable: false,
            title: 'Eliminar el servicio .',
            height: 200,
            width: 450,
            modal: true,
            buttons: {
                "Eliminar": function () {
                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/suite/index.php/c_servicio/delete_serv',
                        async: true,
                        data: {id: id},
                        complete: function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>La servicio fué eliminado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Servicio eliminado.',
                                height: 200,
                                width: 450,
                                modal: true
                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_servicio";
                            }, 2000);

                        }, error: function (error) {

                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable: false,
                                title: 'Error eliminando el servicio!.',
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

