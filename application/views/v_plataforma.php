<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administración de plataforma
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Plataforma</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Información servidor</h3>
                        </div>
                       
                        <?php echo form_open(base_url("index.php/c_plataforma/formulario_plataforma")); ?>
                        <div class="panel-body">
                            
                            <!-- -->
                       <!-- -->
                            
   <?php 

 
           
       $nombre_servidor =
                 array('name'           =>'nombre_servidor',
                        'maxlength'      =>'30' ,
                        'class'          =>'form-control',
                        'value'          => set_value('nombre_servidor'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese ...',
                        'type'           =>'text');  
      
       
        $ram =    array('name'           =>'ram',
                        'maxlength'      =>'30' ,
                        'min'            =>'1',    
                        'class'          =>'form-control',
                        'value'          => set_value('ram'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese ...',
                        'type'           =>'number');   
        $cpu =    array('name'           =>'cpu',
                        'maxlength'      =>'30' ,
                        'min'            =>'1',    
                        'class'          =>'form-control',
                        'value'          => set_value('cpu'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese ...',
                        'type'           =>'number');   
        
        $so =     array('name'           =>'so',
                        'maxlength'      =>'55' ,
                        'minlength'      =>'1',    
                        'class'          =>'form-control',
                        'value'          => set_value('so'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese ...',
                        'type'           =>'text');   
        
        $ip =     array('name'           =>'ip',
                        'maxlength'      =>'15' ,
                        'minlength'      =>'1',    
                        'class'          =>'form-control',
                        'value'          => set_value('ip'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese ...',
                        'type'           =>'text'); 
        /*-- info del servicio*/
        $servicio =     
                  array('name'           =>'servicio',
                        'maxlength'      =>'35' ,
                        'minlength'      =>'1',    
                        'class'          =>'form-control',
                        'value'          => set_value('servicio'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese ...',
                        'type'           =>'text');   
        $proposito =     
                  array('name'           =>'proposito',
                        'maxlength'      =>'25' ,
                        'minlength'      =>'1',    
                        'class'          =>'form-control',
                        'value'          => set_value('proposito'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese ...',
                        'type'           =>'text');   
            
        
       $ds_po    =array('name'          =>'ds_po',
                        'maxlength'      =>'100' ,
                        'class'          =>'form-control',
                        'value'          => set_value('ds_po'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese una descripción breve...'
                        ) ;
     $descripcion=array('name'          =>'descripcion',
                        'maxlength'      =>'100' ,
                        'class'          =>'form-control',
                        'value'          => set_value('descripcion'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese una descripción breve...'
                        ) ;
                

?>
                         
                            
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Ingrese el nombre del servidor</label>
                                    <?php echo form_error('nombre_servidor','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Nombre</span>
                                        

                                           <?php echo form_input($nombre_servidor); ?>
                                      
                                         </div>       
                                     
                                </div>
                               

                            </div>
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Ingrese la cantidad de cpu</label>
                                    <?php echo form_error('cpu','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">CPU</span>
                                        

                                           <?php echo form_input($cpu); ?>
                                      
                                         </div>       
                                     
                                </div>
                               

                            </div>
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Ingrese la cantidad de Ram(GB)</label>
                                    <?php echo form_error('ram','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">RAM</span>
                                        

                                           <?php echo form_input($ram); ?>
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label>Run usuario</label>
                                    <?php echo form_error('run_usuario','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Run</span>
                                        
                                        <input type="hidden" name="run_usuario"   class="form-control" value =" <?php echo $this->session->userdata('id_usuario')?>" />
                                      
                                        <input type="text"  disabled="true"  class="form-control" value =" <?php echo $this->session->userdata('id_usuario')?>" />
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label>Seleccione el cliente de la plataforma</label>
                                                <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Cliente</span>
                                        
                                        <select required="true" name="id_cliente" class="form-control">
                                            <option value="">Seleccione</option>
                                             <?php
                                        foreach ($lista  as $value) {
                                            echo "<option value='" . $value->id_cliente. "'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                        </select>
                                        
                                      
                                         </div>       
                                     
                                </div>
                               

                            </div>
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Ingrese el nombre del sistema operativo</label>
                                    <?php echo form_error('so','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Sistema Operativo</span>
                                        

                                           <?php echo form_input($so); ?>
                                      
                                         </div>       
                                     
                                </div>
                               
                                <div class="form-group">
                                    <label>Ingrese la ip del servidor </label>
                                    <?php echo form_error('ip','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">IP</span>
                                        

                                           <?php echo form_input($ip); ?>
                                      
                                         </div>       
                                     
                                </div>
                               

                            </div>
               
                          </div>
                      
                        
                     
                      
                    </div>
                           
                </div>  <!-- -->
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Información del servicio</h3>
                        </div>
                       
                      
                        <div class="panel-body">
                            
                            <!-- -->
                       <!-- -->
                            
               
                            
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Mencione el servicio</label>
                                    <?php echo form_error('servicio','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Servicio</span>
                                        

                                           <?php echo form_input($servicio); ?>
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label>Mencione el propósito</label>
                                    <?php echo form_error('proposito','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Propósito</span>
                                        

                                           <?php echo form_input($proposito); ?>
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label>Ingrese una breve descripción de propósito</label>
                                    <?php echo form_error('ds_po','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Descripción</span>
                                        

                                           <?php echo form_input($ds_po); ?>
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                   
                                    <label>Seleccione el tipo servicio</label>
                                    <?php echo form_error('nombre','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Tipo servicio</span>
                                        

                                        <select class="form-control" name="tipo_servicio">
                                            <option value="">Seleccione</option>
                                             <?php
                                        foreach ($lista_ts  as $value) {
                                            echo "<option value='" . $value->id_tipo_servicio. "'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                        </select>
                                      
                                         </div>       
                                     
                                </div>

                            </div>
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Ingrese una breve descripción del servicio</label>
                                    <?php echo form_error('descripcion','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                   
                                        

                                           <?php echo form_textarea($descripcion); ?>
                                      
                                        
                                     
                                </div>
                               

                            </div>
                           
     
                          </div>
                       <?php 
                            if(isset($mensaje)){
                               
                                echo $mensaje;
                               
                            }
                            ?>
                        
                     
                        <div class="panel-footer"> <button type="submit"  id="btnAgregar_componente" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Agregar Plataforma</button> </div>
                            
                    </div>
                           
                </div>  <!-- -->
                <?php echo form_close() ?>
            </div>
        </div>                            


    </div>

    <div class="row ">
        <div class="panel panel-default panel-table ">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h1 class="panel-title text-right">Tipos componentes del sistema</h1>
                    </div>
                    

                </div>
            </div>
            <div class="table-responsive">          
                <div class="panel-body">
                    <div class="col-md-12">

                        <table id="tbl_plataforma" class="table  table-bordered table-hover" cellspacing="0">
                            <thead >
                                <tr>
                                    <th>Acción</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Cpu</th>
                                    <th>Ram</th>
                                    <th>Ip</th>
                                    <th>S.O</th>
                                    <th>Propósito</th>
                                    <th>Servicio</th>
                                    <th>Cliente</th>
                                 
                                  
                                   
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


        <div id="modaldelete_plataforma" class="modal fade" role="dialog">
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
                        <input type="hidden" id="id_plataforma">

                        <button type="button" class="btn btn-danger grupo1" onclick="eliminar_plataforma_ajax()"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                        <button type="button" class="btn btn-default grupo2" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                        <button type="button" class="btn btn-default grupo1"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"> </span> Cancelar</button>
                    </div>
                </div>

            </div>
        </div>

        
           

      
    </div>


    <!--  ventana modal para modificar los datos de la plataforma--->
    <form id="form_updateplataforma">
          <div class="modal fade" id="modal_formulario_pla" tabindex="-1" role="dialog" 
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
                    Actualizar plataforma
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="msj"></div>
                
                <div class="form-group ">
                    <div class="input-group">
                         <span class="input-group-addon"  id="basic-addon1">Código</span>
                         <input type="number" class="form-control" disabled="true" id="cod_pla"  maxlength="10" required="true"  aria-describedby="basic-addon1">
                   
                         <span class="input-group-addon" id="basic-addon2">Nombre</span>    
                         <input type="text" class="form-control" id="nombre_pla"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
                   
                    
                    </div>       
                </div>       
            
                 
                <div class="form-group ">
                   <div class="input-group">
                      <span class="input-group-addon" id="basic-addon2">CPU</span>    
                      <input type="number"  id="cpu_pla" class="form-control" required="true"  placeholder="Ingrese.." aria-describedby="basic-addon2"/>
                       <span class="input-group-addon" id="basic-addon2">Ram</span>    
                  <input type="number" min="0" class="form-control" id="ram_pla"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
                 
                   </div>
                   </div>
            
           
            
                
                  <div class="form-group "> 
                        <div class="input-group ">
                           <span class="input-group-addon" id="basic-addon2">IP</span>    
                           <input type="text"  class="form-control" id="ip_pla"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
                           <span class="input-group-addon" id="basic-addon2">Propósito</span>    
                           <input type="text"  class="form-control" id="pro_pla" disabled="true" required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">

                        </div>
             
               </div>
              
               
             
          
                <div class="form-group  ">
                    <div class="input-group ">
                       <span class="input-group-addon" id="basic-addon2">Servicio</span>    
                       <input type="text"  class="form-control" id="ser_pla"  disabled="true" required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
                       <span class="input-group-addon" id="basic-addon2">Cliente</span>    
                       <input type="text"  class="form-control" id="cli_pla" disabled="true" required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
                 
                    
                    </div>
                  </div>
                <div class="form-group  ">
                    <div class="input-group ">
                       <span class="input-group-addon" id="basic-addon2">S.O</span>    
                       <input type="text"  class="form-control" id="so_pla"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
                      
                    
                    </div>
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
                      
        <button type="button" class="btn btn-default grupo2" id="btnmensaje" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>

                    </div>
                </div>

            </div>
        </div>   
</div>