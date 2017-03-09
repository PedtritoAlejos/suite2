<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       <link href="<?php echo base_url("plantilla/css/estilos_login.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("plantilla/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("plantilla/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url("plantilla/js/jquery.js")?>"></script>
        <script>
      $(document).ready(function() {
       
               $("#show").change(function(){
                 //  var valor =$("#clave").val();
                var type=$("#clave").attr("type");
                if(type==="password"){
                    $("#clave").attr("type","text");
                }else if(type==="text"){
                     $("#clave").attr("type","password"); 
                }
              
               });
               
    
});



            
        </script>
    </head>
