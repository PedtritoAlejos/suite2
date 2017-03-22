<!DOCTYPE html>

<body  style="background: #DEDEDE;">
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-darkness/jquery-ui.css" />
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">

<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/funci_proposito.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/table.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<style>
    .ui-dialog-buttonset
    {color:black;}
</style>
<script type="text/javascript" >
    function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[A-Za-z0-9 _.,!"'/$]+|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>

<div class="ibody">
    <br>
    <center>
                <div style="text-align:  center; width: 40%;">
                    <h3 style="background:#6495ed; color: white ; border: 2px solid #cccccc;
    border-radius: 5px; border-top: 3px solid blue; ">Registrar proposito</h3>
            </div>
            </center>
    <br>
    <div class="fcontacto">
        <?php echo form_open('c_proposito/agre_pro', 'name="form1"'); ?>
        <center>
        <div style="text-align:  center; width: 40%;">
        <div class="row">
            <div class="col-md-12">
                <input type="text" name="nombre" id="name" class="form-control" placeholder="Nombre"  required>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <textarea  name="descripcion" placeholder="Descripcion" class="form-control" onkeypress="validate(event)" required></textarea>
            </div>
        </div>
            <div class="row">
            
            <div class="col-md-12">
                <textarea  name="observacion_final" placeholder="Observacion final" class="form-control" onkeypress="validate(event)" required></textarea>
            </div>
            </div>
            <div >
                <input type="radio" name="activo_pro" value="1" required> Activo&nbsp;|	&nbsp;
                <input type="radio" name="activo_pro" value="0"> No activo
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
    border-radius: 5px; border-top: 3px solid green;">Tabla proposito</h3>
    </div>
    </center>

<table id="tabla" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>observacion_final</th>
            <th>activo</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Observacion_final</th>
            <th>Activo</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </tfoot><tbody>
        <?php
        foreach ($prop as $fila):
            ?>

            <tr>
                <td id="nombre<?= $fila->id_proposito ?>"><?= $fila->nombre ?></td>
                <td id="descripcion<?= $fila->id_proposito ?>"><?= $fila->descripcion ?></td>
                <td id="observacion_final<?= $fila->id_proposito ?>"><?= $fila->observacion_final ?></td>
                <td id="activo_pro<?= $fila->id_proposito ?>"><?= $fila->activo_pro ?></td>
               
                <td id="eliminar"><input type="button" value="Eliminar"  style="background: red; color: white; border-radius: 5px;" id="<?= $fila->id_proposito ?>" class="eliminar"></td>
                <td id="editar"><input type="button" value="Editar"  style="background: green; color: white; border-radius: 5px;" id="<?= $fila->id_proposito ?>" class="editar"></td>
            </tr>

            <?php
        endforeach;
        ?></tbody>
</table>
<script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
</body>
</html>
