<!DOCTYPE html>
<body  style="background: #DEDEDE;">

<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />

    <!--<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/estilo_tabla.css" media="screen" />
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/funci_servi.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/datetimepicker_css.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <style>
        .ui-dialog-buttonset
        {color:black;}
    </style>
    <script type="text/javascript">$(document).ready(function () {
            $('#tabla_tipo').dataTable();
            $('#tabla_usu').dataTable();
            $('#tabla_cli').dataTable();
            $('#tabla_serv').dataTable();
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
        function cambiar(esto) //fuction que ocuta el panel
        {
            vista = document.getElementById(esto).style.display;
            if (vista == 'none')
                vista = 'block';
            else
                vista = 'none';
            document.getElementById(esto).style.display = vista;
        }
    </script>

    <div style="text-align:  center;width: 100%;">
        <a  href="#"  class="btn btn-primary" onclick="cambiar('div_tipo');
                    return false;">Tabla tipo servicio</a>
    <a  href="#" class="btn btn-primary" onclick="cambiar('div_usu');
                return false;">Tabla usuario</a>
    <a  href="#"  class="btn btn-primary" onclick="cambiar('div_client');
                return false;">Tabla cliente</a> 
        </div>
    <div id="div_tipo" style="display: none; ">
        <center>
            <div style="text-align:  center; width: 100%;">
                <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
                    border-radius: 5px; border-top: 3px solid green;">Tabla tipo servicio</h3>
            </div>

        </center>
        <table id="tabla_tipo" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>act tipo servicio</th>
                    <th>Ingresar</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>act tipo servicio</th>
                    <th>Ingresar</th>
                </tr>
            </tfoot><tbody>
                <?php
                foreach ($t_tipo as $fil):
                    ?>

                    <tr>
                        <td id="nombre<?= $fil->id_tipo_servicio ?>"><?= $fil->nombre ?></td>
                        <td id="descipcion<?= $fil->id_tipo_servicio ?>"><?= $fil->descipcion ?></td>
                        <td id="activo_tipo_s<?= $fil->id_tipo_servicio ?>"><?= $fil->activo ?></td>
                        <td id="eliminr"><input type="button" value="Ingresar" style="background: #000080; color: white; border-radius: 5px;" id="<?= $fil->id_tipo_servicio ?>" class="editar_tipo"></td>

                    </tr>

                    <?php
                endforeach;
                ?></tbody>
        </table>
    </div>


    <div id="div_usu" style="display: none; ">
        <center>
            <div style="text-align:  center; width: 100%;">
                <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
                    border-radius: 5px; border-top: 3px solid green;">Tabla usuario</h3>
            </div>

        </center>
        <table id="tabla_usu" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Run usuario</th>
                    <th>Dv run</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Ingresar</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Run usuario</th>
                    <th>Dv run</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Ingresar</th>
                </tr>
            </tfoot><tbody>
                <?php
                foreach ($t_usu as $fil):
                    ?>

                    <tr>
                        <td id="run_usuario<?= $fil->run_usuario ?>"><?= $fil->run_usuario ?></td>
                        <td id="dv_run<?= $fil->run_usuario ?>"><?= $fil->dv_run ?></td>
                        <td id="nombre<?= $fil->run_usuario ?>"><?= $fil->nombre ?></td>
                        <td id="apellido_paterno<?= $fil->run_usuario ?>"><?= $fil->apellido_paterno ?></td>
                        <td id="apellido_materno<?= $fil->run_usuario ?>"><?= $fil->apellido_materno ?></td>
                        <td id="eliminr"><input type="button" value="Ingresar" style="background: #000080; color: white; border-radius: 5px;" id="<?= $fil->run_usuario ?>" class="editar_usu"></td>

                    </tr>

                    <?php
                endforeach;
                ?></tbody>
        </table>
    </div>


    <div id="div_client" style="display: none; ">
        <center>
            <div style="text-align:  center; width: 100%;">
                <h3 style="background:#80ff80; color: white ; border: 2px solid #cccccc;
                    border-radius: 5px; border-top: 3px solid green;">Tabla cliente</h3>
            </div>

        </center>
        <table id="tabla_cli" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha_inicio</th>
                    <th>Fecha_final</th>
                    <th>Activo</th>
                    <th>Ingresar</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha_inicio</th>
                    <th>Fecha_final</th>
                    <th>Activo</th>
                    <th>Ingresar</th>
                </tr>
            </tfoot><tbody>
                <?php
                foreach ($t_cli as $fil):
                    ?>

                    <tr>
                        <td id="nombre<?= $fil->id_cliente ?>"><?= $fil->nombre ?></td>
                        <td id="descripcion_cliente<?= $fil->id_cliente ?>"><?= $fil->descripcion_cliente ?></td>
                        <td id="fecha_inicio<?= $fil->id_cliente ?>"><?= $fil->fecha_inicio ?></td>
                        <td id="fecha_final<?= $fil->id_cliente ?>"><?= $fil->fecha_final ?></td>
                        <td id="activo<?= $fil->id_cliente ?>"><?= $fil->activo ?></td>
                        <td id="eliminr"><input type="button" value="Ingresar" style="background: #000080; color: white; border-radius: 5px;" id="<?= $fil->id_cliente ?>" class="editar_cli"></td>

                    </tr>

                    <?php
                endforeach;
                ?></tbody>
        </table>
    </div>

    <div class="ibody">
        <center>
            <div style="text-align:  center; width: 57%;">
                <h3 style="background:#6495ed; color: white ; border: 2px solid #cccccc;
                    border-radius: 5px; border-top: 3px solid blue; ">Registrar servicio</h3>
            </div>
        </center>



        <div class="fcontacto">
            <?php echo form_open('c_servicio/agre_serv', 'name="form1" class="form-inline"'); ?>
            <center>
                <div style="text-align:  center; width: 57%;">
                    <div class="row">
                        <div class="col-xs-6 col-md-4">
                            <input type="text" name="id_tipo_servicio" class="form-control" id="id_tipo" placeholder="Foranea de tipo servicio" readonly required>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <input type="text" name="run_usuario" class="form-control" id="id_usu" placeholder="Foranea de usuario" readonly required>
                        </div> 
                        <div class="col-xs-6 col-md-4">
                            <input type="text" name="id_cliente" class="form-control" id="id_cli" placeholder="Foranea de cliente" readonly required>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-md-4">

                            <input type="text" id="demo1" class="form-control" name="nombre" onkeypress="validate(event)" placeholder="Nombre servicio" required />

                        </div>
                        <div class="col-xs-12 col-md-8">
                            <textarea style="width:100%" name="descripcion" placeholder="Descripcion" class="form-control" onkeypress="validate(event)" required></textarea>
                        </div>
                    </div>
                    <div >
                        <input type="radio" class="form-control" name="activo_serv" value="1" required> Activo	&nbsp;|	&nbsp;
                        <input type="radio" class="form-control" name="activo_serv" value="0"> No activo<br>
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
                    border-radius: 5px; border-top: 3px solid green;">Tabla servicio</h3>
            </div>
        </center>
        <table id="tabla_serv" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Activo servicio</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Activo servicio</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </tfoot><tbody>
                <?php
                foreach ($t_serv as $fila3):
                    ?>

                    <tr>
                        <td id="nombre<?= $fila3->id_servicio ?>"><?= $fila3->nombre ?></td>
                        <td id="descripcion<?= $fila3->id_servicio ?>"><?= $fila3->descripcion ?></td>
                        <td id="activo<?= $fila3->id_servicio ?>"><?= $fila3->activo ?></td>
                        <td id="eliminar"><input type="button" value="Eliminar" style="background: red; color: white; border-radius: 5px;" id="<?= $fila3->id_servicio ?>" class="eliminar_serv"></td>
                        <td id="editar"><input type="button" value="Editar" style="background: green; color: white; border-radius: 5px;" id="<?= $fila3->id_servicio ?>" class="editar_serv"></td>
                    </tr>

                    <?php
                endforeach;
                ?></tbody>
        </table>
        <script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
</body>
</html>