<!DOCTYPE html>
<body  style="background: #DEDEDE;">

<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />

    <!--<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/estilo_tabla.css" media="screen" />
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/funci_alert.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/datetimepicker_css.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <style>
        .ui-dialog-buttonset
        {color:black;}
    </style>
    <script type="text/javascript">$(document).ready(function () {
            $('#tabla_sistema').dataTable();
            $('#tabla_alert').dataTable();

        });
        function validate(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[A-Za-z0-9 _.,!"'/%$]+|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault)
                    theEvent.preventDefault();
            }
        }

    </script>
    
<center>
    <div style="text-align:  center; width: 100%;">
                    <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
    border-radius: 5px; border-top: 3px solid green;">Tabla sistema</h3>
    </div>
    
</center>
<table id="tabla_sistema" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>activo</th>
            <th>Ingresar</th>

        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>activo</th>
            <th>Ingresar</th>
        </tr>
    </tfoot><tbody>
        <?php
        foreach ($sistem as $fil):
            ?>

            <tr>
                <td id="nombre<?= $fil->id_sistema ?>"><?= $fil->nombre ?></td>
                <td id="descripcion<?= $fil->id_sistema ?>"><?= $fil->descripcion ?></td>
                <td id="activo_alert<?= $fil->id_sistema ?>"><?= $fil->activo ?></td>
                <td id="eliminr"><input type="button" value="Ingresar" style="background: #000080; color: white; border-radius: 5px;" id="<?= $fil->id_sistema ?>" class="editar_sist"></td>

            </tr>

            <?php
        endforeach;
        ?></tbody>
</table>
<div class="ibody">
    <center>
                <div style="text-align:  center; width: 40%;">
                    <h3 style="background:#6495ed; color: white ; border: 2px solid #cccccc;
    border-radius: 5px; border-top: 3px solid blue; ">Registrar alerta</h3>
            </div>
            </center>
    


    <div class="fcontacto">
        <?php echo form_open('c_alerta/agre_alert', 'name="form1" class="form-inline"'); ?>
        <center>
            <div style="text-align:  center; width: 40%;">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="id_sistema" class="form-control" id="id_sistema" placeholder="Foranea de sistema" readonly required>
                    </div>
                    <div class="col-md-6">

                        <input type="text" id="demo1" class="form-control" name="nombre" onkeypress="validate(event)" placeholder="Nombre alerta" />

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea style="width:96%" name="descripcion" placeholder="Descripcion" class="form-control" onkeypress="validate(event)" required></textarea>
                    </div>
                </div>
                <div >
                    <input type="radio" class="form-control" name="activo_alert" value="1" required> Activo	&nbsp;|	&nbsp;
                    <input type="radio" class="form-control" name="activo_alert" value="0"> No activo<br>
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
    <center>
        <div style="text-align:  center; width: 100%;">
                    <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
    border-radius: 5px; border-top: 3px solid green;">Tabla alerta</h3>
    </div>
    </center>
    <table id="tabla_alert" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Activo alerta</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Activo alerta</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </tfoot><tbody>
            <?php
            foreach ($alertt as $fila2):
                ?>

                <tr>
                    <td id="nombre<?= $fila2->id_alerta ?>"><?= $fila2->nombre ?></td>
                    <td id="descripcion<?= $fila2->id_alerta ?>"><?= $fila2->descripcion ?></td>
                    <td id="activo_alerta<?= $fila2->id_alerta ?>"><?= $fila2->activo_alert ?></td>
                    <td id="eliminar"><input type="button" value="Eliminar" style="background: red; color: white; border-radius: 5px;" id="<?= $fila2->id_alerta ?>" class="eliminar_alert"></td>
                    <td id="editar"><input type="button" value="Editar" style="background: green; color: white; border-radius: 5px;" id="<?= $fila2->id_alerta ?>" class="editar_alert"></td>
                </tr>

                <?php
            endforeach;
            ?></tbody>
    </table>
    <script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
</body>
</html>
