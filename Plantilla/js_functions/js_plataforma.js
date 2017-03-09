/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var table_pla;

    $(document).ready(function (){
        $('#tbl_plataforma').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/c_plataforma/lis_com',
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
                                <li><a href='#' onclick='modificar_plataforma("+row.Codigo+",\n\
\x22"+row.Nombre+"\x22 ,\n\
\x22"+row.Cpu+"\x22,\x22"+row.Ram+"\x22,\x22"+row.Ip+"\x22,\x22"+row.So+"\
\x22,\x22"+row.Proposito+"\x22,\x22"+row.Servicio+"\x22 ,\x22"+row.Cliente+"\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_plataforma("+row.Codigo+",\x22"+row.Nombre+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
            }
        },
        {data:'Codigo'},
        {data:'Nombre'},
        {data:'Cpu'},
        {data:'Ram'},
        {data:'Ip'},
        {data:'So'},
        {data:'Proposito'},
        {data:'Servicio'},
        {data:'Cliente'}
       
       
       
    ] ,
    'order':[[0,"asc"]]
});
table_pla = $('#tbl_plataforma').DataTable();
// 
table_pla.columns( [1]).visible( false, false );

});



function delete_plataforma(code ,nombre){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#id_plataforma').val(code);
   $('#modaldelete_plataforma .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar la plataforma [ '+nombre+' ] ?');
   $('#modaldelete_plataforma').modal('show');
  
 
}
function modificar_plataforma(code,nombre,cpu,ram,ip,so,proposito,servicio,cliente){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#cod_pla').val(code);
  $('#nombre_pla').val(nombre);
  $('#cpu_pla').val(cpu);
  $('#ram_pla').val(ram);
  $('#ip_pla').val(ip);
  $('#pro_pla').val(proposito);
  $('#ser_pla').val(servicio);
  $('#so_pla').val(so);
  $('#cli_pla').val(cliente);
    
  $('#modal_formulario_pla').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_plataforma_ajax(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        cod_pla:$('#cod_pla').val(),
                        nombre_pla:$('#nombre_pla').val(),
                        cpu_pla:$('#cpu_pla').val(),
                        ram_pla:$('#ram_pla').val(),
                        ip_pla:$('#ip_pla').val(),
                        so_pla:$('#so_pla').val()
                    
                       },
                    url: base_url+'index.php/c_plataforma/modificar_plataforma_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table_pla.ajax.reload();
                          mensaje_modal('Plataforma actualizado correctamente');
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


function eliminar_plataforma_ajax()
            {
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        id_plataforma: $('#id_plataforma').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/c_plataforma/eliminar_plataforma',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete_plataforma .modal-body p').text("eliminado correctamente");
                           table_pla.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete_plataforma .modal-body p').text("Ha ocurrido un error al intentar eliminar el tipo componente");
                              $(".grupo1").hide();
                            $(".grupo2").show();
                        }
                    }
                });
            }
            
            
            
            
    //efecto toggle en el panel de información        

           

       


             



