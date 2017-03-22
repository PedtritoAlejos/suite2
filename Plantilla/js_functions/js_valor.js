$("#panelsistema").hide();
var table_va = null;
function getSistema(item)
{
    var valor = item.value;
    if (table_va === null) {

        $("#panelsistema").show();

        if (valor !== "seleccione") {
            mostrar_sistema(item.value);
        }

    } else {
        limpiar_tabla();
        table_va = null;
        $("#panelsistema").show();
        if (valor !== "seleccione") {
            mostrar_sistema(item.value);
        }

    }


}
function refrescar() {
    location.reload();
}
function limpiar_tabla() {
    var table = $('#tbl_valores').DataTable();
    table.destroy();
    $('#tbl_valores').empty();

}

function mostrar_sistema(codesistema) {

    table_va = $('#tbl_valores').dataTable({
        'language': {
            'url': 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
        },
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'ajax': {
            'data': {
                'id_sistema': codesistema
            },
            'url': base_url + 'index.php/c_valor/listar',
            'type': 'POST',
            dataSrc: ''
        },
        'columns':
                [
           
           
                    { "title": "Opción" ,
                        'orderable': true,
                        render: function (data, type, row)
                        {
                            return "<div class='btn-group'> \n\
                            <button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-cog'></span> Opción</button> \n\
                            <button type='button' class='btn btn-primary dropdown-toggle'\n\
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\n\
                              <span class='caret'></span>\n\
                              <span class='sr-only'>Toggle Dropdown</span>\n\
                            </button>\n\
                            <ul class='dropdown-menu'>\n\
                                <li><a href='#' onclick='modificar_valor(" + row.id_valor + ",\x22" + row.resultado + "\x22 ,\x22" + row.nombre_componente + "\x22,\x22" + row.fecha + "\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_valor(" + row.id_valor + ",\x22" + row.resultado + "\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
                        }
                    },
                    {title : "Id sistema" , data: 'id_sistema' },
                    {title : "Id valor" , data: 'id_valor'},
                    {title : "Resultado" , data: 'resultado'},
                    {title : "Id componente" , data: 'id_componente'},
                    {title : "Nombre componente" , data: 'nombre_componente'},
                    {title : "Fecha registro" , data: 'fecha'}
                    
                   


                ],
        'order': [[0, "asc"]]
    });
    table_default = $('#tbl_valores').DataTable();

 table_default.columns( [1,4]).visible( false, false );
}




function delete_valor(code, nombre) {//metodo que pregunta en una ventana modal si se quiere eliminar
    $('.grupo2').hide();
    $('.grupo1').show();
    $('#id_valor').val(code);
    $('#modaldelete_valor .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar el valor llamado [ ' + nombre + ' ] ?');
    $('#modaldelete_valor').modal('show');


}
function modificar_valor(code, resultado, componente,fecha) {//metodo que pregunta en una ventana modal si se quiere modificar
    $('#cod_v').val(code);
    $('#resultado_v').val(resultado);
    $('#componente').val(componente);
    $('#fecha').val(fecha);
    $('#modal_formulario_valor').modal('show');


}
//'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_valor_ajax() {
    $.ajax({
        type: "POST",
        async: false,
        dataType: "json",
        data: {
            cod_valor: $('#cod_v').val(),
            resultado_valor: $('#resultado_valor_nuevo').val()
           


        },
        url: base_url + 'index.php/c_valor/modificar_valor_ajax',
        success: function (data)
        {
//                       
            if (data.status === "success")
            {
                table_default.ajax.reload();
                mensaje_modal('valor actualizado correctamente');
            } else if (data.status === "success"){
                 mensaje_modal('Error al actualizar');
            }else 
            {

                $("#msj").html("<div class='alert alert-danger alert-dismissable'>\n\
  <button type='button' class='close' data-dismiss='alert'>&times;</button>\n\
  <strong>¡Error!</strong> " + data.error + ".\n\
</div>");
                //muestra los errores
            }
        }
    });


}


function eliminar_valor_ajax()
{
    $.ajax({
        type: "POST",
        async: false,
        dataType: "json",
        data: {
            code_valor: $('#id_valor').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        url: base_url + 'index.php/c_valor/eliminar',
        success: function (data)
        {
//                        $(".grupo2").show();
//                        $(".grupo1").hide();
            if (data.status === "success")
            {
                $(".grupo1").hide();
                $(".grupo2").show();
                $('#modaldelete_valor .modal-body p').text("eliminado correctamente");
                table_default.ajax.reload(); //actualiza tabla 
            } else
            {
                $('#modaldelete_valor .modal-body p').text("Ha ocurrido un error al intentar eliminar el tipo componente");
                $(".grupo1").hide();
                $(".grupo2").show();
            }
        }
    });
}




//efecto toggle en el panel de información        









