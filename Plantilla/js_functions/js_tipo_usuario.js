var table_tu;

    $(document).ready(function (){
        $('#tbl_tipousuario').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/c_tipo_usuario/listar_tipos_usuarios',
        'type':'POST',
        dataSrc:''
    },
    'columns':
    [
         {'orderable':true,
        render:function(data,type,row)
            {
                return "<div class='btn-group'> \n\
                            <button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-cog'></span> Opción</button> \n\
                            <button type='button' class='btn btn-primary dropdown-toggle'\n\
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>\n\
                              <span class='caret'></span>\n\
                              <span class='sr-only'>Toggle Dropdown</span>\n\
                            </button>\n\
                            <ul class='dropdown-menu'>\n\
                                <li><a href='#' onclick='modificar_tipousuario("+row.id_tipo_usuario+",\x22"+row.nombre+"\x22 ,\x22"+row.descripcion+"\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_tipousuario("+row.id_tipo_usuario+",\x22"+row.nombre+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
            }
        },
        {data:'id_tipo_usuario'},
        {data:'nombre'},
        {data:'descripcion'}
       
       
       
    ] ,
    'order':[[0,"asc"]]
});
table_tu = $('#tbl_tipousuario').DataTable();
 
table_tu.columns( [1]).visible( false, false );

});



function delete_tipousuario(code ,nombre){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#id_tu').val(code);
   $('#modaldelete_tipousuario .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar el tipo usuario llamado [ '+nombre+' ] ?');
   $('#modaldelete_tipousuario').modal('show');
  
 
}
function modificar_tipousuario(id_tipo_componente,nombre_componente,descripcion){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#codetipuser').val(id_tipo_componente);
  $('#nombre_tu').val(nombre_componente);
  $('#desc_tu').val(descripcion);
  $('#modal_formulario_tu').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_tipo_usuario_ajax(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        code_tu:$('#codetipuser').val(),
                        nombre_tu:$('#nombre_tu').val(),
                        descri_tu:$('#desc_tu').val()
                       
                       
                        },
                    url: base_url+'index.php/c_tipo_usuario/modificar_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table_tu.ajax.reload();
                          mensaje_modal(' Tipo usuario actualizado correctamente <span class="glyphicon glyphicon-ok"></span>');
                        }
                        else if (data.status === "error")
                        { 
                           mensaje_modal('Problemas al actualizar intentelo mas tarde!');  
                        }else {
                        
                            $("#msj").html("<div class='alert alert-danger alert-dismissable'>\n\
  <button type='button' class='close' data-dismiss='alert'>&times;</button>\n\
  <strong>¡Error!</strong> "+data.error+".\n\
</div>");
                            //muestra los errores
                        }
                    }
                });

        
}


function eliminar_tipousuario_ajax()
            {
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        id_tuser: $('#id_tu').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/c_tipo_usuario/eliminar_tipousuario',
                    success: function(data)
                    {
//                        $(".grupo2").show();
//                        $(".grupo1").hide();
                        if(data.status === "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete_tipousuario .modal-body p').html("<span class='glyphicon glyphicon-ok'></span> Eliminado correctamente ");
                           table_tu.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete_tipousuario .modal-body p').text("Ha ocurrido un error al intentar eliminar el tipo usuario");
                              $(".grupo1").hide();
                            $(".grupo2").show();
                        }
                    }
                });
            }
            
            
            
            
    //efecto toggle en el panel de información        

           

       


             


