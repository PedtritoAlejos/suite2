
<!--   <script src="<?php // echo base_url("plantilla/js/jquery.js")?>"></script>se comento esto -->
   <script src="<?php echo base_url("plantilla/js/jquery2.js")?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
   
    <script src="<?php echo base_url("plantilla/datatables/media/js/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_usuarios.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_componentes.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_tipo_componente.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_plataforma.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_sistema.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_tipo_muestra.js"); ?>"></script>
    
    <script src="<?php echo base_url("plantilla/js_functions/js_validaciones.js"); ?>"></script>
<!--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> se comentoesto -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  es nuevo-->
<!--    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
var url=document.URL;

switch (url.toString()) {
    case 'http://localhost/Proyecto/index.php/c_crud/iniciar_sesion':
   $('#cliente').addClass('active');
        break;
    case 'http://localhost/Proyecto/index.php/c_usuario/index_usuario':
        $('#usuario').addClass('active');
    break;
    default:
        
        break;
}
</script>
</body>

</html>
