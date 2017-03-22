<!DOCTYPE html>
<html lang="es">

<head>
<?php 
if($this->session->userdata('id_tipo_usuario')){
    
}
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("plantilla/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("plantilla/css/estilos_personalizados.css"); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("plantilla/css/sb-admin.css") ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url("plantilla/css/plugins/morris.css") ?>" rel="stylesheet">
   
    <link href="<?php  echo base_url("plantilla/datatables/media/css/jquery.dataTables.min.css") ?>" rel="stylesheet">

    <!-- Custom Fonts -->
   
    <link href="<?php echo base_url("plantilla/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("plantilla/datatables/media/css/tablaPersonalizado.css"); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
$.webshims.formcfg = {
en: {
    dFormat: '-',
    dateSigns: '-',
    patterns: {
        d: "yy-mm-dd"
    }
}
};

</script>
 <script >
var base_url ;
        base_url= '<?php echo base_url()?>';
          $(document).ready(function(){
                $("#form_update").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar usuario
                  modificar_usuario();
                });
                $("#form_update_com").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar componente
                  modificar_componente_ajax();
                });
                $("#form_updatetipocomponente").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar tipo componente
                  modificar_tipo_componente_ajax();
                });
                //actualizar platlaforma 
                $("#form_updateplataforma").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar plataforma
                  modificar_plataforma_ajax();
                });
                $("#form_updatetipousuario").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar tipo usuario
                modificar_tipo_usuario_ajax();
                });
                $("#form_update_tmuestra").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar tipo muestra
                  modificar_tipo_muestra_ajax();
                });
                //actualizar sistema
                $("#form_update_sistema").submit(function(e){
                    e.preventDefault();
                 //llamo al metodo de actualizar sistema
                  modificar_sistema_ajax();
                });
                
               $("#form_insert").submit(function (e){
                    e.preventDefault();
                 if(validaRut()){
//                     $("#form_insert").submit();
                   document.getElementById("form_insert").submit();
                 }
               
                });
               $("#form_updatevalor").submit(function (e){
                    e.preventDefault();
                 modificar_valor_ajax();
               
                });
            });
</script>
 

</head>