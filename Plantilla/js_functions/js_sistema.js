/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var table_sis;

    $(document).ready(function (){
        $('#tbl_sistema').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/c_sistema/mostrar_sistema',
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
                                <li><a href='#' onclick='modificar_sistema("+row.id_sistema+",\n\
\x22"+row.nombre+"\x22 ,\n\
\x22"+row.descripcion+"\x22,\x22"+row.plataforma+"\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_sistema("+row.id_sistema+",\x22"+row.nombre+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
            }
        },
        {data:'id_sistema'},
        {data:'nombre'},
        {data:'descripcion'},
        {data:'plataforma'}
    ] ,
    'order':[[0,"asc"]]
});
table_sis = $('#tbl_sistema').DataTable();
//// 
//table_pla.columns( [1]).visible( false, false );

});



function delete_sistema(code ,nombre){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#id_sis').val(code);
   $('#modaldelete_sistema .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar el sistema [ '+nombre+' ] ?');
   $('#modaldelete_sistema').modal('show');
  
 
}
function modificar_sistema(code,nombre,descripcion,plataforma){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#c_sistema').val(code);
  $('#nombre_sis').val(nombre);
  $('#desc_sist').val(descripcion);
  $('#nombre_plataf').val(plataforma);

    
  $('#modal_formulario_sistema').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_sistema_ajax(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        cod_sistema:$('#c_sistema').val(),
                        nombre_sistena:$('#nombre_sis').val(),
                        descr_sistema:$('#desc_sist').val()
                      
                    
                       },
                    url: base_url+'index.php/c_sistema/modificar_sistema_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table_sis.ajax.reload();
                          mensaje_modal('Sistema actualizado correctamente');
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


function eliminar_sistema_ajax()
            {
              
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        sistemaid: $('#id_sis').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/c_sistema/eliminar_sistema_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete_sistema .modal-body p').text("eliminado correctamente");
                           table_sis.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete_sistema .modal-body p').text("Ha ocurrido un error al intentar eliminar el tipo componente");
                              $(".grupo1").hide();
                            $(".grupo2").show();
                        }
                    }
                });
            }
            
            
            
            
    //efecto toggle en el panel de información        

           

       


             




