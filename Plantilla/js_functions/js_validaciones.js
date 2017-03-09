/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validar_registro(){
  var run = $('#run').val();
  var dv_run=$('#dv_run').val();
  var nombre=$('#nombre').val();
  var paterno=$('#paterno').val();
  var materno=$('#materno').val();
  var correo=$('#correo').val();
  var clave=$('#clave').val();
  var tipo=$('#tipo_usuario').val();
  
  if(run!="" || run.length!=0){
     // cuando el campo run no esta vacio
     if(dv_run!=""||dv_run.length!=0){
         
         if(nombre!=""||nombre.length!=0){
             
             if(paterno!=""||paterno.length!=0){
                 
                 if(materno!=""||materno.length!=0){
                     
                       if(correo!=""||correo.length!=0){
                           
                             if(clave!=""||clave.length!=0){
                     
                                    if(tipo!=""||tipo.length!=0){
                     
                                        // si todo es correcto se llama el metodo para agregar
                                                agregar_usuario();
                                    }else{
                                         mensaje_modal("El campo Tipo usuario no puede estar vacio");
                                         focuss("tipo_usuario"); 
                                    }
                    
                            }else{
                                 mensaje_modal("El campo Contraseña no puede estar vacio");
                                 focuss("clave"); 
                            }
                     
                    
                        }else{
                             mensaje_modal("El campo Correo no puede estar vacio");
                             focuss("correo"); 
                        }
                    
                 }else{
                      mensaje_modal("El campo Apellido materno no puede estar vacio");
                      focuss("materno"); 
                 }
                 
             }else{
              mensaje_modal("El campo Apellido paterno no puede estar vacio");
              focuss("paterno");
             }
         }else{
              mensaje_modal("El campo Nombre no puede estar vacio");
              focuss("nombre");
         }
     }else{
           mensaje_modal("El campo Dv-Run no puede estar vacio");
           focuss("dv_run");
     }
  }else{
     
        mensaje_modal("El campo Run no puede estar vacio");
        focuss("run");
  }
    
}

function mensaje_modal(mensaje){
   $('#modalmensaje .modal-body p').html('<span class="glyphicon glyphicon-arrow-right"></span>'+mensaje);
   $('#modalmensaje').modal('show');
   
}
function focuss(id){
    $("#btnmensaje").click( function(){
   document.getElementById(id.toString()).focus();
    });
}
