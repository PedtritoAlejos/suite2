/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var table_tm;

    $(document).ready(function (){
        $('#tbl_tipomuestra').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/c_tipo_muestra/listar_muestra',
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
                                <li><a href='#' onclick='modificar_muestra("+row.id_tipo_muestra+",\x22"+row.nombre+"\x22 )'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_muestra("+row.id_tipo_muestra+",\x22"+row.nombre+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
            }
        },
        {data:'id_tipo_muestra'},
        {data:'nombre'}
    
    ] ,
    'order':[[0,"asc"]]
});
table_tm = $('#tbl_tipomuestra').DataTable();
 

});



function delete_muestra(code ,nombre){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#id_tm').val(code);
   $('#modaldelete_tipomuestra .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar el tipo muestra llamado [ '+nombre+' ] ?');
   $('#modaldelete_tipomuestra').modal('show');
  
 
}
function modificar_muestra(id_tipo_muestra,nombre_muestra){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#tpm').val(id_tipo_muestra);
  $('#nombre_tm').val(nombre_muestra);
  $('#modal_formulario_tm').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_tipo_muestra_ajax(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        cod_tm:$('#tpm').val(),
                        nombre_tm:$('#nombre_tm').val()
                      
                       
                       
                        },
                    url: base_url+'index.php/c_tipo_muestra/modificar_tipo_muestra_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table_tm.ajax.reload();
                          mensaje_modal('Tipo muestra actualizado correctamente');
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


function eliminar_tipomuestra_ajax()
            {
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        id_muestra: $('#id_tm').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/c_tipo_muestra/eliminar_muestra',
                    success: function(data)
                    {
//                        $(".grupo2").show();
//                        $(".grupo1").hide();
                        if(data.status === "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete_tipomuestra .modal-body p').text("eliminado correctamente");
                           table_tm.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete_tipomuestra .modal-body p').text("Ha ocurrido un error al intentar eliminar el tipo componente");
                              $(".grupo1").hide();
                            $(".grupo2").show();
                        }
                    }
                });
            }
            
            
            
            
    //efecto toggle en el panel de información        

           

       


             



