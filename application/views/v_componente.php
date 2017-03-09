<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administración de  Componente
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Componente</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nuevo Componente</h3>
                        </div>
                       
                        <?php echo form_open(base_url("index.php/c_componente/insertar_componente")); ?>
                        <div class="panel-body">
                            
                            <!-- -->
                       <!-- -->
                            
   <?php 

 
           
        $nombre = array('name'          =>'nombre',
                        'maxlength'      =>'30' ,
                        'class'          =>'form-control',
                        'value'          => set_value('nombre'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese su nombre...',
                        'type'           =>'text');   
            
        
     $descripcion=array('name'          =>'descripcion',
                        'maxlength'      =>'30' ,
                        'class'          =>'form-control',
                        'value'          => set_value('descripcion'),
                        'required'       =>'true',
                        'placeholder'    =>'Ingrese una descripción breve...'
                        ) ;
                

?>
                         
                            
                            <div class="container col-md-6">
                                <div class="form-group">
                                    <label>Ingrese el nombre del componente</label>
                                    <?php echo form_error('nombre','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Nombre</span>
                                        

                                           <?php echo form_input($nombre); ?>
                                      
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

    <div class="row ">
        <div class="panel panel-default panel-table ">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h1 class="panel-title text-right">Componentes del sistema</h1>
                    </div>
                    

                </div>
            </div>
            <div class="table-responsive">          
                <div class="panel-body">
                    <div class="col-md-12">

                        <table id="tbl_componente" class="table  table-bordered table-hover" cellspacing="0">
                            <thead >
                                <tr>
                                    <th>Acción</th>
                                    <th>IdTipo componente</th>
                                    <th>Id componente</th>
                                    <th>Nombre componente</th>
                                    <th>Descripcion</th>
                                    <th>Tipo componente</th>
                                   
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


        <div id="modaldelete_componente" class="modal fade" role="dialog">
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
                        <input type="hidden" id="id_c">

                        <button type="button" class="btn btn-danger grupo1" onclick="eliminar_componente_ajax()"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                        <button type="button" class="btn btn-default grupo2" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                        <button type="button" class="btn btn-default grupo1"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"> </span> Cancelar</button>
                    </div>
                </div>

            </div>
        </div>

        
           

      
    </div>


    <!--  ventana modal para modificar los datos del componente--->
    <form id="form_update_com">
          <div class="modal fade" id="modal_formulario_c" tabindex="-1" role="dialog" 
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
                    Actualizar componente
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="msj"></div>
                <div class="input-group">
                     <span class="input-group-addon"  id="basic-addon1">Código componente</span>
                     <input type="number" class="form-control" disabled="true" id="co_co"  maxlength="10" required="true"  aria-describedby="basic-addon1">
                 </div>       
           
              <br>
               <div class="input-group">
               <span class="input-group-addon" id="basic-addon2">Nombre componente</span>    
                <input type="text" class="form-control" id="nombre_cc"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
               </div>
              <br>
               <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">Descripción componente</span>    
               <textarea  id="descr_compo" class="form-control" required="true"  placeholder="Ingrese.." aria-describedby="basic-addon2"></textarea>
                 
               </div>
              <br>
               <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">Tipo componente</span>   
                <select class="form-control" required="true" id="tipo_componente_c" >
                     <option value="" required="true">Seleccione</option>
                                     <?php 
                                       foreach ($lista as $value) {
                                       echo "<option value='".$value->id_tipo_componente."'>".$value->nombre."</option>";
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