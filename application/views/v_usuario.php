<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administración de  Usuarios
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Agregar usuario</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nuevo Usuario</h3>
                        </div>
                       
                        <?php echo form_open(base_url("index.php/c_usuario/insertar_usuario"),"id='form_insert'"); ?>
                        <div class="panel-body">
                            
                            <!-- -->
                       <!-- -->
                            
   <?php 
   $run = array( 'name'   => 'run',
                        'maxlength'       => '10',
                        'min'             => '0',
                        'aria-describedby'=>'basic-addon1',
                        'value'           => set_value('run'),
                        'class'           => 'form-control',
                        'required'        =>'true',
                        'id'              =>'run_v',
                        'placeholder'     =>'Ingrese el run sin puntos...',
                        'type'            =>'number');
 
           
        $nombre = array('name'          =>'nombre',
                        'maxlength'      =>'30' ,
                        'class'          =>'form-control',
                        'value'          => set_value('nombre'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su nombre...',
                        'type'           =>'text');   
            
        $clave=array( 'name'          =>'clave',
                        'maxlength'      =>'150' ,
                        'class'          =>'form-control',
                        'value'          => set_value('clave'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su contraseña...',
                        'type'           =>'password');
            
        $paterno=array('name'          =>'paterno',
                        'maxlength'      =>'50' ,
                        'class'          =>'form-control',
                        'value'          => set_value('paterno'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su apellido paterno...',
                        'type'           =>'text');
        
        $materno=array('name'          =>'materno',
                        'maxlength'      =>'50' ,
                        'class'          =>'form-control',
                        'value'          => set_value('materno'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su apellido materno...',
                        'type'           =>'text');
            
        $correo=array('name'          =>'correo',
                        'maxlength'      =>'50' ,
                        'class'          =>'form-control',
                        'value'          => set_value('correo'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su email...',
                        'type'           =>'email') ;
                

?>
                         
                            
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Ingrese el run del usuario sin puntos</label>
                                    <?php echo form_error('run','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Run</span>
                                        
<!--                                        <input type="number"  min="1" maxlength="10" class="form-control"
                                               required="true" id="run_v" name="run"  placeholder="Run usuario" 
                                               aria-describedby="basic-addon1">-->
                                           <?php echo form_input($run); ?>
                                      
                                        <span class="input-group-addon" id="basic-addon1">-</span>

                                        <select name="dv" id="dv_v" class="form-control" aria-describedby="basic-addon1">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>k</option>
                                        </select>
                                       <div class="input-group-btn">
                                           <!-- Buttons --><button type="button" onclick="validaRut()" class="btn btn-danger">Validar run</button>
  </div>
                                    </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label>Ingrese el nombre del usuario</label>
                                    
<!--                                    <input required="true" name="nombre" class="form-control">-->
                                       <?php echo form_input($nombre); ?>
                                    
                                     <?php echo form_error('nombre','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese la clave del usuario</label>
                                    
<!--                                    <input required="true" type="password"  name="clave" class="form-control">-->
                                       <?php echo form_input($clave); ?>
                                     <?php echo form_error('clave','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                </div>



                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Ingrese el apellido paterno</label>
<!--                                    <input required="true" name="paterno" class="form-control">-->
                                           <?php echo form_input($paterno); ?>
                                     <?php echo form_error('paterno','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese el apellido materno</label>
<!--                                    <input required="true" name="materno" class="form-control">-->
                                       <?php echo form_input($materno); ?>
                                     <?php echo form_error('materno','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese el correo del usuario</label>
<!--                                    <input required="true" type="email" name="correo" class="form-control">-->
                                       <?php echo form_input($correo); ?>
                                    
                                     <?php echo form_error('correo','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                            
                                </div>
                             
                                <div class="form-group">
                                    <label>Seleccione un tipo de usuario</label>
                                    <select class="form-control" required="true" name="tipo_usuario" >
                                        <option value="" required="true">Seleccione</option>
                                        <?php
                                        foreach ($lista  as $value) {
                                            echo "<option value='" . $value->id_tipo_usuario . "'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                          </div>
                       <?php 
                            if(isset($mensaje)){
                               
                                echo $mensaje;
                               
                            }
                            ?>
                     
                        <div class="panel-footer"> <button type="submit" disabled="true"  id="btnAgregar" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Agregar Registro</button> </div>
                            
                    </div>
                            <?php echo form_close(); ?>
                </div>
            </div>
        </div>                            


    </div>

    <div class="row ">
        <div class="panel panel-default panel-table ">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h1 class="panel-title text-right">Usuarios del sistema</h1>
                    </div>
                    

                </div>
            </div>
            <div class="table-responsive">          
                <div class="panel-body">
                    <div class="col-md-12">

                        <table id="tbl_usuarios" class="table  table-bordered table-hover" cellspacing="0">
                            <thead >
                                <tr>
                                    <th>Acción</th>
                                    <th>Run</th>
                                    <th>Dv-run</th>
                                    <th>Nombre</th>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Correo</th>
                                    <th>Contraseña</th>
                                    <th>Activo</th>
                                    <th>Perfil</th>




                                </tr>
                            </thead>
                        </table> 

                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <div class="row">

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
    <div class="row">


        <div id="modaldelete" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header alert alert-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-pushpin"></span> Mensaje</h4>
                    </div>
                    <div class="modal-body">
                        <p> </p>
                    </div>
                    <div class="modal-footer ">
                        <input type="hidden" id="run_usuario">

                        <button type="button" class="btn btn-danger grupo1" onclick="eliminar_usuario()"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                        <button type="button" class="btn btn-default grupo2" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                        <button type="button" class="btn btn-default grupo1"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"> </span> Cancelar</button>
                    </div>
                </div>

            </div>
        </div>

        
           

      
    </div>


    <!--  ventana modal para modificar los datos del usuario--->
    <form id="form_update">
          <div class="modal fade" id="modal_formulario" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header alerta_azul">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <span class="glyphicon glyphicon-folder-open"> </span> &nbsp;
                    Actualizar usuario
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="msj"></div>
                <div class="input-group">
                     <span class="input-group-addon"  id="basic-addon1">Run</span>
                     <input type="number" class="form-control" disabled="true" id="run"  maxlength="10" required="true" placeholder="Run usuario" aria-describedby="basic-addon1">
                     <span class="input-group-addon" id="basic-addon1">-</span>
                     <input type="text" class="form-control" maxlength="1"  disabled="true" id="dv_run" required="true" placeholder="k" aria-describedby="basic-addon1">
                </div>       
           
              <br>
               <div class="input-group">
               <span class="input-group-addon" id="basic-addon2">Nombre</span>    
                <input type="text" class="form-control" id="nombre"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
                 <span class="input-group-addon" id="basic-addon2">Apellido paterno</span>   
                <input type="text" class="form-control"  id="paterno" required="true" placeholder="Paterno.." aria-describedby="basic-addon2">
                </div>
              <br>
               <div class="input-group">
                
               <span class="input-group-addon" id="basic-addon2">Apellido materno</span>    
               <input type="text" class="form-control" id="materno" required="true" name="materno_m" placeholder="Ingrese.." aria-describedby="basic-addon2">
                 <span class="input-group-addon" id="basic-addon2">Correo</span>   
                 <input type="email" class="form-control"  id="correo"  required="true" placeholder="correo.." aria-describedby="basic-addon2">
                </div>
              <br>
               <div class="input-group">
               <span class="input-group-addon" id="basic-addon2">Contraseña</span>    
               <input type="password" id="clave_us" class="form-control" required="true"  placeholder="Ingrese.." aria-describedby="basic-addon2">
                 <span class="input-group-addon" id="basic-addon2">Tipo usuario</span>   
                <select class="form-control" required="true" id="tipo_usuario" >
                     <option value="" required="true">Seleccione</option>
                                     <?php 
                                       foreach ($lista as $value) {
                                       echo "<option value='".$value->id_tipo_usuario."'>".$value->nombre."</option>";
                                }  
                                   ?>
                </select>
               
                </div>
                  
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-sign"></span>  Cerrar
                </button>
                <button type="submit" class="btn btn-primary"  ><span class="glyphicon glyphicon-refresh"></span> Actualizar datos</button>
               
                   
              
            
            </div>
            
        </div>
    </div>
</div>
    <!-- -->
    </form>
       <div id="modalmensaje" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header  alerta_azul">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-pushpin"></span> Mensaje</h4>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer ">
                        <input type="hidden" id="run_usuario">


                        <button type="button" class="btn btn-default grupo2" id="btnmensaje" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>

                    </div>
                </div>

            </div>
        </div>   
</div>