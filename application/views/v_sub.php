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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/estilo_tabla.css" media="screen" />
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/funci_sub_v.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/datetimepicker_css.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <style>
        .ui-dialog-buttonset
        {color:black;}
    </style>
    <script type="text/javascript">$(document).ready(function () {
            $('#tabla_valor_s').dataTable();
            $('#tabla_sub').dataTable();

        });
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
    </script>

<center>
    <div style="text-align:  center; width: 100%;">
        <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
            border-radius: 5px; border-top: 3px solid green;">Tabla valor</h3>
    </div>
</center>
<table id="tabla_valor_s" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>resultado</th>
            <th>fecha</th>
            <th>Ingresar</th>

        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>resultado</th>
            <th>fecha</th>
            <th>Ingresar</th>
        </tr>
    </tfoot><tbody>
        <?php
        foreach ($valor_s as $fil):
            ?>

            <tr>
                <td id="resultado<?= $fil->id_valor ?>"><?= $fil->resultado ?></td>
                <td id="fecha<?= $fil->id_valor ?>"><?= $fil->fecha ?></td>
                

                <td id="eliminr"><input type="button" value="Ingresar" style="background: #000080; color: white; border-radius: 5px;" id="<?= $fil->id_valor?>" class="editar_valor"></td>

            </tr>

            <?php
        endforeach;
        ?></tbody>
</table>
<div class="ibody">

    <center>
        <div style="text-align:  center; width: 40%;">
            <h3 style="background:#6495ed; color: white ; border: 2px solid #cccccc;
                border-radius: 5px; border-top: 3px solid blue; ">Registrar subvalor</h3>
        </div>
    </center>


    <div class="fcontacto">
        <?php echo form_open('c_sub_valor/agre_sub', 'name="form1" class="form-inline"'); ?>
        <center>
            <div style="text-align:  center; width: 40%;">
                <div class="row">
                    <div class="col-md-6">
                        
                        <input type="text" name="id_valor" class="form-control" id="valorforan" placeholder="Id valor" readonly required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="nombre_sv" id="nombre_sv"    placeholder="Nombre" class="form-control" pattern="[a-zA-Z0-9-]+" required/>
                    </div>
                </div>
                <div class="row">
                    

                    <div class="col-md-12">
                        <input type="text" style="width:97%;" name="resultado_sv" id="resultado_sv"   placeholder="Resultado" class="form-control" pattern="[a-zA-Z0-9-]+"  required/>
                    </div>
                </div>
                <div >
                    <input type="radio" class="form-control" name="activo_sv" value="1" required> Activo	&nbsp;|	&nbsp;
                    <input type="radio" class="form-control" name="activo_sv" value="0"> No activo<br>
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
                border-radius: 5px; border-top: 3px solid green;">Tabla subvalor</h3>
        </div>
        <table id="tabla_sub" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>resultado</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>nombre</th>
                    <th>resultado</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </tfoot><tbody>
                <?php
                foreach ($sub_v as $fila2):
                    ?>

                    <tr>
                        <td id="nombre<?= $fila2->id_sub_valor  ?>"><?= $fila2->nombre  ?></td>
                        <td id="resultado<?= $fila2->id_sub_valor  ?>"><?= $fila2->resultado   ?></td>

                        <td id="eliminar"><input type="button" value="Eliminar" style="background: red; color: white; border-radius: 5px;" id="<?= $fila2->id_sub_valor ?>" class="eliminar_sub"></td>
                        <td id="editar"><input type="button" value="Editar" style="background: green; color: white; border-radius: 5px;" id="<?= $fila2->id_sub_valor ?>" class="editar_sub"></td>
                    </tr>

                    <?php
                endforeach;
                ?></tbody>
        </table>
        <script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
        </body>
        </html>