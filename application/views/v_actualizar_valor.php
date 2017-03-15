<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Actualizar valor
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= base_url("index.php/c_usuario/index_usuario") ?>">administrar usuarios</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Formulario
                    </li>
                </ol>
            </div>
        </div>


        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus-sign"></span> Actualizar</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Modificar valor</h3>
                        </div>
                       
                        <?php echo form_open(base_url("index.php/c_valor/modificar_valor")); ?>
                        <div class="panel-body">
                            
                            <!-- -->
                       <!-- -->
                            
  
                         
                            
                            <div class="container col-md-12">
                                <div class="form-group">
                                    <label> Id valor</label>
                                   
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Id valor</span>
                                        

                                        <input type="text" disabled="true" class="form-control" value="<?php echo $idvalor ?>">
                                        <input type="hidden" name="idvalor" class="form-control" value="<?php echo $idvalor ?>">
                                        <input type="hidden" name="idsistema" class="form-control" value="<?php echo $idsistema ?>">
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label> nombre del componente</label>
                                   
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Nombre</span>
                                        

                                        <input type="text" disabled="true" name="componente" class="form-control" value="<?php echo $componente ?>">
                                      
                                         </div>       
                                     
                                </div>
                               
                                
                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Resultado anterior</label>
                                    <input name="resultado" disabled="true"  value="<?php echo $resultado; ?>" class="form-control"/>
                               </div>
                                
                                
                             
                                
                            </div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Ingrese el nuevo valor a reemplazar por el anterior</label>
                                    <textarea name="resultado_nuevo" class="form-control"></textarea>
                               </div>
                                
                                
                             
                                
                            </div>
                          </div>
                       <?php 
                            if(isset($mensaje)){
                               
                                echo $mensaje;
                               
                            }
                            ?>
                     
                        <div class="panel-footer"> <button type="submit"  id="btnAgregar_componente" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Actualizar valor</button> </div>
                            
                    </div>
                            <?php echo form_close(); ?>
                </div>
            </div>
        </div>                            


    </div>

  




    <style>
        .row{
            margin-top:40px;
            padding: 0 10px;
        }

        .clickable{
            cursor: pointer;   
        }

        .panel-heading span {
            margin-top: -20px;
            font-size: 15px;
        }
    </style>
   

    <!--  ventana modal para modificar los datos del componente--->
  
       
</div>