var table_c;

    $(document).ready(function (){
        $('#tbl_componente').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/c_componente/listar_componentes',
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
                                <li><a href='#' onclick='modificar_componente("+row.id_tipo_componente+",\x22"+row.id_componente+"\x22 ,\x22"+row.nombre_componente+"\x22 ,\x22"+row.descripcion+"\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_componente("+row.id_componente+",\x22"+row.nombre_componente+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
            }
        },
        {data:'id_tipo_componente'},
        {data:'id_componente'},
        {data:'nombre_componente'},
        {data:'descripcion'},
        {data:'nombre'}
       
       
    ] ,
    'order':[[0,"asc"]]
  
});
table_c = $('#tbl_componente').DataTable();
 
table_c.columns( [1,2]).visible( false, false );

});



function delete_componente(code ,nombre){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#id_c').val(code);
   $('#modaldelete_componente .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar el componente llamado [ '+nombre+' ] ?');
   $('#modaldelete_componente').modal('show');
  
 
}
function modificar_componente(id_tipo_componente,id_componente,nombre_componente,descripcion){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#co_co').val(id_componente);
  $('#nombre_cc').val(nombre_componente);
  $('#descr_compo').val(descripcion);
  $('#tipo_componente_c').val(id_tipo_componente);
  $('#modal_formulario_c').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_componente_ajax(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        cod_m:$('#co_co').val(),
                        nombre_c:$('#nombre_cc').val(),
                        descripcion_m:$('#descr_compo').val(),
                        tipo_componente_m:$('#tipo_componente_c').val()
                       
                        },
                    url: base_url+'index.php/c_componente/modificar_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table_c.ajax.reload();
                          mensaje_modal('Componente actualizado correctamente');
                        }
                        else
                        {
                        
                            $("#msj").html("<div class='alert alert-danger alert-dismissable'>\n\
  <button type='button' class='close' data-dismiss='alert'>&times;</button>\n\
  <strong>¡Error!</strong> "+data.error+".\n\
</div>");
                            //muestra los errores
                        }
                    }
                });

        
}


function eliminar_componente_ajax()
            {
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        id_cc: $('#id_c').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/c_componente/eliminar_componente',
                    success: function(data)
                    {
//                        $(".grupo2").show();
//                        $(".grupo1").hide();
                        if(data.status === "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete_componente .modal-body p').text("eliminado correctamente");
                           table_c.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete_componente .modal-body p').text("Ha ocurrido un error al intentar eliminar el componente");
                              $(".grupo1").hide();
                            $(".grupo2").show();
                        }
                    }
                });
            }
            
            
            
            
    //efecto toggle en el panel de información        

           

       


             
