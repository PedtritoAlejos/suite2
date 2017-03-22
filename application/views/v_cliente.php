<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<body  style="background: #DEDEDE;">
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />
<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url("plantilla/js_functions/js_cliente.js"); ?>"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/table.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!--<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>-->
<style>
    .ui-dialog-buttonset
    {color:black;}
</style>
<script type="text/javascript" >
    
    $(document).ready(function () {
            $('#tabla').dataTable();
           

        });
    
    function compare()
    {
        var startDt = document.getElementById("startDate").value;
        var endDt = document.getElementById("endDate").value;
        if ((new Date(startDt).getTime() < new Date(endDt).getTime()))
        {
            document.getElementById("mySubmit").disabled = false;
            //document.getElementById("myForm").submit(); 
        } else
        {
            $('.edit_modal2').dialog("close");

            $("<div class='edit_modal2'>La fecha final no puede ser menor a la fecha de inicio</div>").dialog({
                resizable: false,
                title: 'Fecha incorrecta.',
                height: 200,
                width: 450,
                modal: true
            });
            document.getElementById("mySubmit").disabled = true;
        }
    }
    function compare2()
    {
        var startDt = document.getElementById("startDate").value;
        var endDt = document.getElementById("endDate").value;
        if ((new Date(startDt).getTime() < new Date(endDt).getTime()))
        {
            document..disabled = false;
            //document.getElementById("myForm").submit(); 
        } else
        {
            $('.edit_modal2').dialog("close");

            $("<div class='edit_modal2'>La fecha final no puede ser menor a la fecha de inicio</div>").dialog({
                resizable: false,
                title: 'Fecha incorrecta.',
                height: 200,
                width: 450,
                modal: true
            });
            document.getElementById("mySubmit").disabled = true;
        }
    }
</script>
<div class="ibody">
    <br>
    
    <center>
                <div style="text-align:  center; width: 40%;">
                    <h3 style="background:#6495ed; color: white ; border: 2px solid #cccccc;
    border-radius: 5px; border-top: 3px solid blue; ">Registrar cliente</h3>
            </div>
            </center>
    <br>
    <div class="fcontacto">
        <?php echo form_open('c_cliente/agre_client', 'name="form1"'); ?>
        <center>
        <div style="text-align:  center; width: 40%;">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="nombre" id="name" class="form-control" placeholder="Nombre" pattern="[a-zA-Z0-9-]+" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="descripcion_cliente" maxlength="15" onpaste="return false"  placeholder="Descripcion" class="form-control" pattern="[a-zA-Z0-9-]+" required/>
            </div>
            </div>
            <div class="row">
                <div class="col-md-6">
            <label >Fecha de inicio</label>
            
                <input type="date" name="fecha_inicio" id="startDate" maxlength="15" onpaste="return false"  placeholder="Fecha de inicio" class="form-control" required/>
            </div>
            
            <div class="col-md-6">
                <label >Fecha final</label>
                <input type="date" name="fecha_final" id="endDate" maxlength="15" onpaste="return false"  placeholder="Fecha final" class="form-control" onblur="compare();" required/>
            </div>
            </div>
            <div >
                <input type="radio"  name="activo"  value="1" required> Activo&nbsp;|	&nbsp;
                <input type="radio"  name="activo"  value="0"> No activo<br>
            </div>
        
        <div class="btn_submit">
            <input type="submit" id="mySubmit" name="btn" class="btn btn-primary" value="Insertar">
        </div>
        <div id="respuesta" style="display: none;"><?php
            if (isset($mensaje)) {
                echo "<script>alert('" . $mensaje . "');</script>";
            }
            //FIN! thanks for watching!
            echo form_close();
            ?></div>
    </div>
            </center>
        </div>
</div>

<center>
        <div style="text-align:  center; width: 100%;">
                    <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
    border-radius: 5px; border-top: 3px solid green;">Tabla cliente</h3>
    </div>
    </center>
    <table id="tabla" class="display" cellspacing="0" width="100%">
    <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha_inicio</th>
                <th>Fecha_final</th>
                <th>Activo</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha_inicio</th>
                <th>Fecha_final</th>
                <th>Activo</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </tfoot><tbody>
 <?php
        foreach ($users as $fila):
            ?>
        
            <tr>
                <td id="nombre<?= $fila->id_cliente ?>"><?= $fila->nombre ?></td>
                <td id="descripcion_cliente<?= $fila->id_cliente ?>"><?= $fila->descripcion_cliente ?></td>
                <td id="fecha_inicio<?= $fila->id_cliente ?>"><?= $fila->fecha_inicio ?></td>
                <td id="fecha_final<?= $fila->id_cliente ?>"><?= $fila->fecha_final ?></td>
                <td id="activo<?= $fila->id_cliente ?>"><?= $fila->activo ?></td>
                <td id="eliminar"><input type="button" style="background: red; color:white; border-radius: 5px;" value="Eliminar" id="<?= $fila->id_cliente ?>" class="eliminar"></td>
                <td id="editar"><input type="button" style="background: green; color:white; border-radius: 5px;" value="Editar" id="<?= $fila->id_cliente ?>" class="editar"></td>
            </tr>
        
         <?php
        endforeach;
        ?></tbody>
        </table><!--
    <div class="grid_12">
        <div class="grid_12" id="head">
            <div class="grid_2" id="head_nombre">Nombre</div>
            <div class="grid_2" id="head_email">Descripcion</div>
            <div class="grid_2" id="head_registro">Fecha_inicio</div>
            <div class="grid_2" id="head_registro">Fecha_final</div>
            <div class="grid_2" id="head_registro">Activo</div>
            <div class="grid_2" id="head_eliminar">Eliminar</div>
            <div class="grid_2" id="head_editar">Editar</div>
        </div>
        
            -->
           
    

<?php
// put your code here
?>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
</body>
</html>