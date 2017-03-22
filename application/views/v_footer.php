
<!--   <script src="<?php // echo base_url("plantilla/js/jquery.js")?>"></script>se comento esto -->
   <script src="<?php echo base_url("plantilla/js/jquery2.js")?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
   
    <script src="<?php echo base_url("plantilla/datatables/media/js/jquery.dataTables.min.js"); ?>"></script>
    <?php 
switch ($this->uri->segment(1))
{
        case "c_usuario": 
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_usuarios.js"); ?>"></script> <?php break;
        case "c_componente":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_componentes.js"); ?>"></script> <?php break; 
        case "c_tipo_componente":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_tipo_componente.js"); ?>"></script> <?php break; 
        case "c_plataforma":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_plataforma.js"); ?>"></script> <?php break; 
        case "c_sistema":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_sistema.js"); ?>"></script> <?php break; 
        case "c_valor":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_valor.js"); ?>"></script> <?php break; 
        case "c_componente":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_componentes.js"); ?>"></script> <?php break; 
        case "c_tipo_muestra":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_tipo_muestra.js"); ?>"></script> <?php break;
    
        case "c_tipo_usuario":
        ?> <script src="<?php echo base_url("plantilla/js_functions/js_tipo_usuario.js"); ?>"></script> <?php break;
    
}

?>
   
    <!-- script del aljejandro -->
    <script src="<?php echo base_url("plantilla/js_functions/js_cliente.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_horario.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_alerta.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_proposito.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_sub_valor.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_servicio.js"); ?>"></script>
    
    <script src="<?php echo base_url("plantilla/js_functions/js_validaciones.js"); ?>"></script>
<!--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> se comentoesto -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  es nuevo-->
<!--    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
var url=document.URL;


</script>
</body>

</html>
