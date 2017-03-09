var table;

    $(document).ready(function (){
        $('#tbl_usuarios').dataTable({
    'language':{
        'url':'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json'
    },
    'paging':true,
    'info':true,
    'filter':true,
    'stateSave':true,
    'ajax':{
        'url':base_url+'index.php/c_usuario/get_usuarios_todos',
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
                                <li><a href='#' onclick='modificar_user("+row.run_usuario+",\x22"+row.dv_run+"\x22 ,\x22"+row.nombre+"\x22 ,\x22"+row.apellido_paterno+"\x22,\x22"+row.apellido_materno+"\x22 ,\x22"+row.correo+"\x22,\x22"+row.contrasenha+"\x22,\x22"+row.id_tipo_usuario+"\x22)'><span class='glyphicon glyphicon-edit'></span> Modificar</a></li>\n\
                                <li><a href='#' onclick='delete_user("+row.run_usuario+",\x22"+row.nombre+"\x22 ,\x22"+row.apellido_paterno+"\x22)'><span class='glyphicon glyphicon-trash'></span> Eliminar</a></li>\n\
                                </ul>\n\
                      </div>";
            }
        },
        {data:'run_usuario'},
        {data:'dv_run'},
        {data:'nombre'},
        {data:'apellido_paterno'},
        {data:'apellido_materno'},
        {data:'correo'},
        {data:'contrasenha'},
        {data:'Activo'},
        {data:'id_tipo_usuario'}
       
    ],
    'columnDefs':[
           
            {
            'mRender':function(data,type,row){
                return row.run_usuario+"-"+row.dv_run;
            },'targets':[1]
            },
            {
            'mRender':function(data,type,row){
                return row.nombre+" "+row.apellido_paterno+" "+row.apellido_materno;
            },'targets':[3]
            }
            ,
            {
            'mRender':function(data,type,row){
               if(data==1){
                   return "si";
               }
               return "no";
            },'targets':[8]
            },
            {
            'mRender':function(data,type,row){
               if(data==1){
                   return "Administrador";
               }else if (data==2){
               return "Operador";
           }
            },'targets':[9]
            }
           
            
            ]

    ,
    'order':[[0,"asc"]]
});
 table = $('#tbl_usuarios').DataTable();
 
table.columns( [2,4,5]).visible( false, false );

});



function delete_user(run ,nombre ,apellido){//metodo que pregunta en una ventana modal si se quiere eliminar
   $('.grupo2').hide();
   $('.grupo1').show();
   $('#run_usuario').val(run);
   $('#modaldelete .modal-body p').html('<span class="glyphicon glyphicon-record"></span> ¿Quieres eliminar al usuario '+nombre+' '+apellido+' ?');
   $('#modaldelete').modal('show');
  
 
}
function modificar_user(run ,dv,nombre ,paterno,materno,correo,clave,tipo){//metodo que pregunta en una ventana modal si se quiere modificar
  $('#run').val(run); $('#nombre').val(nombre);
  $('#dv_run').val(dv);
  $('#paterno').val(paterno);$('#materno').val(materno);
  $('#correo').val(correo); $('#clave_us').val(clave);
  $('#tipo_usuario').val(tipo);
  $('#modal_formulario').modal('show');
 
 
}
  //'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
function modificar_usuario(){
     $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        run_m:$('#run').val(),
                      
                        nombre_m:$('#nombre').val(),
                        paterno_m:$('#paterno').val(),
                        materno_m:$('#materno').val(),
                        correo_m:$('#correo').val(),
                        clave_m:$('#clave_us').val(),
                        tipo_m:$('#tipo_usuario').val()
                       
                      
                    },
                    url: base_url+'index.php/c_usuario/modificar_ajax',
                    success: function(data)
                    {
//                       
                        if(data.status === "success")
                        {
                           table.ajax.reload();
                          mensaje_modal('Usuario actualizado correctamente');
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


function eliminar_usuario()
            {
                $.ajax({
                    type: "POST",
                    async: false,
                    dataType: "json",
                    data: {
                        id: $('#run_usuario').val()
//                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    url: base_url+'index.php/c_usuario/eliminar_usuario',
                    success: function(data)
                    {
//                        $(".grupo2").show();
//                        $(".grupo1").hide();
                        if(data.status == "success")
                        {
                            $(".grupo1").hide();
                            $(".grupo2").show();
                            $('#modaldelete .modal-body p').text("El usuario ha sido eliminado correctamente");
                           table.ajax.reload();
                        }
                        else
                        {
                            $('#modaldelete .modal-body p').text("Ha ocurrido un error eliminando al usuario");
                        }
                    }
                });
            }
            
            
            
            
    //efecto toggle en el panel de información        
$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	}
});

            function validaRut_usuario(b){
                if (b.match(/^([0-9])+\-([kK0-9])+$/)) {
                    b = b.split("-");
                    var a = b[0].split(""), c = 2, d = 0;
                    for (i = a.length - 1; 0 <= i; i--)
                        c = 7 < c ? 2 : c, d += parseInt(a[i]) * parseInt(c++);
                    a = 11 - d % 11;
                    return(11 == a ? 0 : 10 == a ? "k" : a) == b[1].toLowerCase()
                }
                return!1
            }

        function validaRut(){

                var numerico =$("#run_v").val();
                var dv_run=$("#dv_v").val();
                var rut=numerico+"-"+dv_run;
                    if(validaRut_usuario(rut)){
                         $("#btnAgregar").removeAttr("disabled");
                            return true;
                     //   mensaje_modal(" Rut valido!");  
                    }else{    $("#btnAgregar").attr("disabled","true");
                mensaje_modal(" Rut invalido!");     return false;   
            }

        }

             
