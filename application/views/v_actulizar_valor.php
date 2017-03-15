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
                            
   <?php 

 
           
        $resultado = array('name'        =>'resultado',
                        'maxlength'      =>'30' ,
                        'class'          =>'form-control',
                        'value'          => set_value('resultado'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su nombre...');   
            
        
    
                

?>
                         
                            
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label> nombre del componente</label>
                                   
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Nombre</span>
                                        

                                           <?php echo form_input($componente); ?>
                                      
                                         </div>       
                                     
                                </div>
                               
                                <div class="form-group">
                                    <label>Seleccione el tipo componente</label>
                                    <select class="form-control" required="true" name="tipo_componente" >
                                        <option value="" required="true">Seleccione</option>
                                        <?php
                                        foreach ($lista  as $value) {
                                            echo "<option value='" . $value->id_tipo_componente . "'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Ingrese una descripción</label>

                                   <?php echo form_textarea($descripcion); ?>
                                    
                                     <?php echo form_error('descripcion','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                </div>
                                
                                
                             
                                
                            </div>
                          </div>
                       <?php 
                            if(isset($mensaje)){
                               
                                echo $mensaje;
                               
                            }
                            ?>
                     
                        <div class="panel-footer"> <button type="submit"  id="btnAgregar_componente" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Agregar Componente</button> </div>
                            
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