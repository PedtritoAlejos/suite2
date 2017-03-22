<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<body  style="background: #DEDEDE;">

<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />

    <!--<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">-->
   
     <link href="<?php echo base_url("plantilla/css/estilo_tabla.css"); ?>" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url("plantilla/js_functions/js_horario.js"); ?>"></script>
    <script src="<?php echo base_url("plantilla/js_functions/datatimepicker_css.js"); ?>"></script>
  
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <style>
        .ui-dialog-buttonset
        {color:black;}
    </style>
    <script type="text/javascript">$(document).ready(function () {
            $('#tabla_alert').dataTable();
            $('#tabla_hora').dataTable();

        });
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
        function validarnumerosf() {
            if (parseInt(document.getElementById("hora_").value) < 24 || parseInt(document.getElementById("hora_").value >= 0))
            {
                document.getElementById("hora_").disabled = false;
                //document.getElementById("myForm").submit(); 
            } else
            {
                document.getElementById("hora_").value = "";
                alert('Hora incorrecta');
                /*$('.edit_modal2').dialog("close");
                 $("<div class='edit_modal2'>La fecha final no puede ser menor a la fecha de inicio</div>").dialog({
                 resizable: false,
                 title: 'Fecha incorrecta.',
                 height: 200,
                 width: 450,
                 modal: true
                 });*/
            }
            if (parseInt(document.getElementById("minuto_").value) < 59 || parseInt(document.getElementById("minuto_").value >= 0))
            {
                document.getElementById("minuto_").disabled = false;
                //document.getElementById("myForm").submit(); 
            } else
            {
                document.getElementById("minuto_").value = "";
                alert('Minuto incorrecto');
                /*$('.edit_modal2').dialog("close");
                 $("<div class='edit_modal2'>La fecha final no puede ser menor a la fecha de inicio</div>").dialog({
                 resizable: false,
                 title: 'Fecha incorrecta.',
                 height: 200,
                 width: 450,
                 modal: true
                 });*/
            }
        }

        function validarnumeditar() {
            if (parseInt(document.getElementById("hora_e").value) < 24 && parseInt(document.getElementById("hora_e").value >= 0))
            {
                document.getElementById("hora_e").disabled = false;
                //document.getElementById("myForm").submit(); 
            } else
            {
                document.getElementById("hora_e").value = "";
                alert('Hora incorrecta');
                /*$('.edit_modal2').dialog("close");
                 $("<div class='edit_modal2'>La fecha final no puede ser menor a la fecha de inicio</div>").dialog({
                 resizable: false,
                 title: 'Fecha incorrecta.',
                 height: 200,
                 width: 450,
                 modal: true
                 });*/
            }
            if (parseInt(document.getElementById("minuto_e").value < 60) && parseInt(document.getElementById("minuto_e").value >= 0))
            {
                document.getElementById("minuto_e").disabled = false;
                //document.getElementById("myForm").submit(); 
            } else
            {
                document.getElementById("minuto_e").value = "";
                alert('Minuto incorrecto');
                /*$('.edit_modal2').dialog("close");
                 $("<div class='edit_modal2'>La fecha final no puede ser menor a la fecha de inicio</div>").dialog({
                 resizable: false,
                 title: 'Fecha incorrecta.',
                 height: 200,
                 width: 450,
                 modal: true
                 });*/
            }

        }
    </script>

<center>
    <div style="text-align:  center; width: 100%;">
        <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
            border-radius: 5px; border-top: 3px solid green;">Tabla alerta</h3>
    </div>
</center>
<table id="tabla_alert" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>activo_alert</th>
            <th>id_sistema</th>
            <th>Ingresar</th>

        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>activo_alert</th>
            <th>id_sistema</th>
            <th>Ingresar</th>
        </tr>
    </tfoot><tbody>
        <?php
        foreach ($aler as $fil):
            ?>

            <tr>
                <td id="nombre<?= $fil->id_alerta ?>"><?= $fil->nombre ?></td>
                <td id="descripcion<?= $fil->id_alerta ?>"><?= $fil->descripcion ?></td>
                <td id="activo_alert<?= $fil->id_alerta ?>"><?= $fil->activo_alert ?></td>
                <td id="id_sistema<?= $fil->id_alerta ?>"><?= $fil->id_sistema ?></td>

                <td id="eliminr"><input type="button" value="Ingresar" style="background: #000080; color: white; border-radius: 5px;" id="<?= $fil->id_alerta ?>" class="editar_aler"></td>

            </tr>

            <?php
        endforeach;
        ?></tbody>
</table>
<div class="ibody">

    <center>
        <div style="text-align:  center; width: 40%;">
            <h3 style="background:#6495ed; color: white ; border: 2px solid #cccccc;
                border-radius: 5px; border-top: 3px solid blue; ">Registrar horario</h3>
        </div>
    </center>


    <div class="fcontacto">
        <?php echo form_open('c_horario/agre_horario', 'name="form1" class="form-inline"'); ?>
        <center>
            <div style="text-align:  center; width: 40%;">
                <div class="row">
                    <div class="col-md-6">
                        <label>Foranea de alerta</label>
                        <input type="text" name="alertaforan" class="form-control" id="alertaforan" readonly required>
                    </div>
                    <div class="col-md-6">
                        <label>Fecha horario</label>
                        <input type="text" id="demo1" class="form-control" name="fecha_h" readonly />
                        <img src="<?php echo base_url() ?>images2/cal.gif" onclick="javascript:NewCssCal('demo1')" style="width: 25px; height: 25px; cursor:pointer;"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="hora_h" id="hora_" maxlength="2" onpaste="return false"  placeholder="Hora" class="form-control" pattern="[a-zA-Z0-9-]+" required/>
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="minuto_h" id="minuto_" maxlength="2" onpaste="return false"  placeholder="Minuto" class="form-control" pattern="[a-zA-Z0-9-]+"  required/>
                    </div>
                </div>
                <div >
                    <input type="radio" class="form-control" name="activo_h" value="1" required> Activo	&nbsp;|	&nbsp;
                    <input type="radio" class="form-control" name="activo_h" value="0"> No activo<br>
                </div>

                <div class="btn_submit">
                    <input type="submit" id="mySubmit" name="btn" class="btn btn-primary" value="Insertar" onclick="validarnumerosf()">
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
    <center>
        <div style="text-align:  center; width: 100%;">
            <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
                border-radius: 5px; border-top: 3px solid green;">Tabla horario</h3>
        </div>
        <table id="tabla_hora" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>minuto</th>
                    <th>hora</th>
                    <th>dia del mes</th>
                    <th>numero mes</th>
                    <th>año</th>
                    <th>activo</th>
                    <th>id_alerta</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>minuto</th>
                    <th>hora</th>
                     <th>dia del mes</th>
                    <th>numero mes</th>
                    <th>año</th>
                    <th>activo</th>
                    <th>id_alerta</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </tfoot><tbody>
                <?php
                foreach ($horari as $fila2):
                    ?>

                    <tr>
                        <td id="minuto<?= $fila2->id_horario ?>"><?= $fila2->minuto ?></td>
                        <td id="hora<?= $fila2->id_horario ?>"><?= $fila2->hora ?></td>
                        <td id="dia_del_mes<?= $fila2->id_horario ?>"><?= $fila2->dia_del_mes ?></td>
                        <td id="numero_mes<?= $fila2->id_horario ?>"><?= $fila2->numero_mes ?></td>
                        <td id="anho<?= $fila2->id_horario ?>"><?= $fila2->anio ?></td>
                        <td id="activo_ho<?= $fila2->id_horario ?>"><?= $fila2->activo_ho ?></td>
                        <td id="id_alerta<?= $fila2->id_horario ?>"><?= $fila2->id_alerta ?></td>

                        <td id="eliminar"><input type="button" value="Eliminar" style="background: red; color: white; border-radius: 5px;" id="<?= $fila2->id_horario ?>" class="eliminar_hora"></td>
                        <td id="editar"><input type="button" value="Editar" style="background: green; color: white; border-radius: 5px;" id="<?= $fila2->id_horario ?>" class="editar_hora"></td>
                    </tr>

                    <?php
                endforeach;
                ?></tbody>
        </table>
        <script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
        </body>
        </html>
