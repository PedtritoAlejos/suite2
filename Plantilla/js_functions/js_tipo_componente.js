/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var table_tc;

    $(document).ready(function (){
        $('#tbl_tipocomponente').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/c_tipo_componente/listar_tipos_componentes',
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
                                <li><a href='#' onclick='modificar_tipocomponente("+row.id_tipo_componente+",\x22"+row.nombre+"\x22 ,\x22"+row.descripcion+"\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_tipocomponente("+row.id_tipo_componente+",\x22"+row.nombre+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
            }
        },
        {data:'id_tipo_componente'},
        {data:'nombre'},
        {data:'descripcion'}
       
       
       
    ] ,
    'order':[[0,"asc"]]
});
table_tc = $('#tbl_tipocomponente').DataTable();
 
table_tc.columns( [1]).visible( false, false );

});



function delete_tipocomponente(code ,nombre){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#id_tc').val(code);
   $('#modaldelete_tipocomponente .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar el tipo componente llamado [ '+nombre+' ] ?');
   $('#modaldelete_tipocomponente').modal('show');
  
 
}
function modificar_tipocomponente(id_tipo_componente,nombre_componente,descripcion){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#tpc').val(id_tipo_componente);
  $('#nombre_tc').val(nombre_componente);
  $('#desc_tp').val(descripcion);
  $('#modal_formulario_tc').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_tipo_componente_ajax(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        cod_tc:$('#tpc').val(),
                        nombre_tc:$('#nombre_tc').val(),
                        descripcion_tc:$('#desc_tp').val()
                       
                       
                        },
                    url: base_url+'index.php/c_tipo_componente/modificar_tipo_componente_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table_tc.ajax.reload();
                          mensaje_modal('Tipo componente actualizado correctamente');
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


function eliminar_tipocomponente_ajax()
            {
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        id_tcc: $('#id_tc').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/c_tipo_componente/eliminar_tipocomponente',
                    success: function(data)
                    {
//                        $(".grupo2").show();
//                        $(".grupo1").hide();
                        if(data.status === "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete_tipocomponente .modal-body p').text("eliminado correctamente");
                           table_tc.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete_tipocomponente .modal-body p').text("Ha ocurrido un error al intentar eliminar el tipo componente");
                              $(".grupo1").hide();
                            $(".grupo2").show();
                        }
                    }
                });
            }
            
            
            
            
    //efecto toggle en el panel de información        

           

       


             


