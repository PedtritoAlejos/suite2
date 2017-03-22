
$(document).ready(function () {
    //editamos datos del usuario
    $(".editar").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();
        var descripcion = $("#descripcion_cliente" + id).html();
var fecha_inicio = $("#fecha_inicio" + id).html();
        var fecha_final = $("#fecha_final" + id).html();
        
        $("<div class='edit_modal' style='input[type=button] {color:black;}' >\n\
<form name='edit' id='edit' method='post' action='"+base_url+"/index.php/c_cliente/multi_user'>"+
            "<label>Nombre</label><input style='color: black;' type='text' name='nombre' class='nombre' value="+nombre+" id='nombre' /><br/>"+
            "<input type='hidden' name='id' class='id' id='id' value="+id+">"+
            
            
            "<label>Descripcion</label><input style='color: black;' type='text' name='descripcion_e' class='nombre' value="+descripcion+" id='nombre' /><br/>"+
            
            "<label>Fecha inicio</label><input style='color: black;' type='date' name='fecha_inicio_e' class='nombre' value="+fecha_inicio+" id='nombre' /><br/>"+
            
            "<label>Fecha final</label><input style='color: black;' type='date' name='fecha_final_e' class='nombre' value="+fecha_final+" id='nombre' onblur='compare();' /><br/>"+
            "</form><div class='respuesta'></div></div>").dialog({

                resizable:false,
                title:'Editar cliente.',
                height:300,
                width:450,
                modal:true,
                
                buttons:{
                    
                    "Editar":function () {
                        $.ajax({
                            url : $('#edit').attr("action"),
                            type : $('#edit').attr("method"),
                            data : $('#edit').serialize(),

                            success:function (data) {
                                   $('.edit_modal').dialog("close");

                                    $("<div class='edit_modal'>El cliente fué editado correctamente</div>").dialog({

                                        resizable:false,
                                        title:'Cliente editado.',
                                        height:200,
                                        width:450,
                                        modal:true

                                    });

                                    setTimeout(function() {
                                        window.location.href = base_url+"/index.php/c_cliente";
                                    }, 2000);
                                }, error:function (error) {

                            $('.edit_modal').dialog("close");
                                $("<div class='edit_modal'>Ha ocurrido un error!</div>").dialog({
                                    resizable:false,
                                    title:'Error editando!.',
                                    height:200,
                                    width:450,
                                    modal:true
                                });

                        
                        }

                    });
                    return false;
                },
                Cancelar:function () {
                    $(this).dialog("close");
                }
            }
        });
    });
    
                               /* var obj = JSON.parse(data);

                                if(obj.response == 'error')
                                {
                                    
                                        $(".respuesta").html(obj.nombre + '<br />' + obj.email);
                                        return false;

                                }else{

                                    

                                }

                            }, error:function (error) {
                                $('.edit_modal').dialog("close");
                                $("<div class='edit_modal'>Ha ocurrido un error!</div>").dialog({
                                    resizable:false,
                                    title:'Error editando!.',
                                    height:200,
                                    width:450,
                                    modal:true
                                });
                            }

                        });
                        return false;
                    },
                    Cancelar:function () {
                        $(this).dialog("close");
                    }
                }
            });*/
   
 
    //eliminamos datos del usuario
    $(".eliminar").on('click', function () {

        var id = $(this).attr('id');
        var nombre = $("#nombre" + id).html();

        $("<div class='delete_modal'>¡Estás seguro que deseas eliminar al cliente " + nombre + "?</div>").dialog({

            resizable:false,
            title:'Eliminar al cliente ' + nombre + '.',
            height:200,
            width:450,
            modal:true,
            buttons:{

                "Eliminar":function () {
                    $.ajax({
                        type:'POST',
                        url:base_url+'/index.php/c_cliente/delete_user',
                        async: true,
                        data: { id : id },
                        complete:function () {
                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>El cliente " + nombre + " fué eliminado correctamente</div>").dialog({
                                resizable:false,
                                title:'Cliente eliminado.',
                                height:200,
                                width:450,
                                modal:true
                            });

                            setTimeout(function() {
                                window.location.href = base_url+"/index.php/c_cliente";
                            }, 2000);

                        }, error:function (error) {

                            $('.delete_modal').dialog("close");
                            $("<div class='delete_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error eliminando al cliente!.',
                                height:200,
                                width:550,
                                modal:true

                            });

                        }

                    });
                    return false;
                },
                Cancelar:function () {
                    $(this).dialog("close");
                }
            }
        });
    });
 
    //añadimos usuarios nuevos
    $(".agregar").on('click', function () {

        var id = $(this).attr('id');

        var nombre = $("#nombre" + id).html();

        $("<div class='insert_modal'><form name='insert' id='insert' method='post' action='http://localhost/crud_ci/crud/multi_user'>"+
            "<label>Nombre</label><input type='text' name='nombre' class='nombre' id='nombre' /><br/>"+
            "<label>Email</label><input type='email' name='email' class='email' id='email' /><br/>"+
            "</form><div class='respuesta'></div></div>").dialog({

            resizable:false,
            title:'Añadir nuevo usuario.',
            height:300,
            width:450,
            modal:true,
            buttons:{

                "Insertar":function () {
                    $.ajax({
                        url : $('#insert').attr("action"),
                        type : $('#insert').attr("method"),
                        data : $('#insert').serialize(),

                        success:function (data) {

                            var obj = JSON.parse(data);

                            if(obj.respuesta == 'error')
                            {
                                    
                                    $(".respuesta").html(obj.nombre + '<br />' + obj.email);
                                    return false;

                             }else{

                                $('.insert_modal').dialog("close");
                                $("<div class='insert_modal'>El usuario fué añadido correctamente</div>").dialog({
                                    resizable:false,
                                    title:'Usuario añadido.',
                                    height:200,
                                    width:450,
                                    modal:true
                                });
                                setTimeout(function() {
                                    window.location.href = "http://localhost/crud_ci/crud";
                                }, 2000);
                            }

                        }, error:function (error) {
                            $('.insert_modal').dialog("close");
                            $("<div class='insert_modal'>Ha ocurrido un error!</div>").dialog({
                                resizable:false,
                                title:'Error añadiendo!.',
                                height:200,
                                width:450,
                                modal:true
                            });
                        }
                    });
                    return false;
                },
                Cancelar:function () {
                    $(this).dialog("close");
                }
            }
        });
    });
});