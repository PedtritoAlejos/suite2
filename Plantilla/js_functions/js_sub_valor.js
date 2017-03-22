/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    //editamos datos del usuario
    $(".editar_valor").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#resultado" + id).html();


        document.getElementById("valorforan").value = id;
        alert('eligio la valor '+nombre);
    });

    //editamos datos del usuario
    $(".editar_sub").on('click', function () {

        var id = $(this).attr('id');
        var nombre_sv= $("#nombre" + id).html();
        var resultado_sv = $("#resultado" + id).html();
        

        $("<div class='edit_modal'>\n\
<form name='edit' id='edit' method='post' action='http://localhost/suite/index.php/c_sub_valor/multi_sub'>" +
                "<label>Nombre</label><input style='color: black;' type='text' name='nombre_sv_e'  class='nombre' value='" + nombre_sv + "' id='nombre_sv_e' /><br/>" +
                "<input type='hidden' name='id' class='id' id='id' value=" + id + ">" +
                
           
                "<label>Resultado</label><input style='color: black;' type='text'  name='resultado_sv_e' class='nombre' value='" + resultado_sv + "' id='resultado_sv_e' /><br/>" +
                "</form><div class='respuesta'></div></div>").dialog({
            resizable: false,
            title: 'Editar subvalore.',
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

                            $("<div class='edit_modal'>El subvalor fué editado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Subvalor editado.',
                                height: 200,
                                width: 450,
                                modal: true

                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_sub_valor";
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

    $(".eliminar_sub").on('click', function () {

        var id = $(this).attr('id');
        //var nombre = $("#nombre" + id).html();
        //alert(id + 'eso' + nombre);
        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar al subvalor ?</div>").dialog({
            resizable: false,
            title: 'Eliminar al subvalor .',
            height: 200,
            width: 450,
            modal: true,
            buttons: {
                "Eliminar": function () {
                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/suite/index.php/c_sub_valor/delete_sub',
                        async: true,
                        data: {id: id},
                        complete: function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El subvalor  fué eliminado correctamente</div>").dialog({
                                resizable: false,
                                title: 'Subvalor eliminado.',
                                height: 200,
                                width: 450,
                                modal: true
                            });

                            setTimeout(function () {
                                window.location.href = "http://localhost/suite/index.php/c_sub_valor";
                            }, 2000);

                        }, error: function (error) {

                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable: false,
                                title: 'Error eliminando al subvalor!.',
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



