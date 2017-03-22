<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Administración de valor
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= base_url("index.php/c_tipo_muestra/index") ?>">administrar muestra</a>
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
                    <h3 class="panel-title"><span class="glyphicon glyphicon-plus-sign"></span> Agregar valores</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ingresar valor </h3>
                        </div>
                       
                        <?php echo form_open(base_url("index.php/c_valor/agregar_valor")); ?>
                        <div class="panel-body">
                            
                            <!-- -->
                       <!-- -->
                            
   <?php 

 
           
        $resultado = array('name'          =>'resultado',
                            'maxlength'      =>'300' ,
                            'class'          =>'form-control',
                            'value'          => set_value('resultado'),
                            'required'       =>'true',
                            'width'       =>'100%',
                            'placeholder'    =>'Ingrese ...');
                          
            
 

?>
                         
                            
                            <div class="container col-md-12">
                                <div class="form-group">
                                     <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Run usuario</span>
                                        
                                        <input class="form-control" disabled="true" value="<?php echo $this->session->userdata('id_usuario')?>">
                                       
                                        <input class="form-control" type="hidden" name="runusuario" value="<?php echo $this->session->userdata('id_usuario')?>">
                                       
                                      
                                         </div>    
                                </div>
                                <div class="form-group">
                                    <label>Seleccione el sistema</label>
                                    <?php echo form_error('nombre','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                  
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Sistema</span>
                                        

                                        <select name="idsistema" required="true" class="form-control" >
                                            <option value=""> Seleccione un sistema</opction>
                                                 <?php
                                        foreach ($sistema  as $value) {
                                            echo "<option value='" . $value->id_sistema . "'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                        </select>
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label>Seleccione el componente</label>
                                 
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Componente</span>
                                        
                                        <select name="idcomponente" required="true" class="form-control" >
                                                 <option value=""> Seleccione un componente</opction>
                                                      <?php
                                        foreach ($componente  as $value) {
                                            echo "<option value='" . $value->id_componente . "'>" . $value->nombre_componente . "</option>";
                                        }
                                        ?>
                                             </select>
                                         
                                      
                                         </div>       
                                     
                                </div>
                                <div class="form-group">
                                    <label>Seleccione el tipo muestra</label>
                                    <?php echo form_error('nombre','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                  
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Muestra</span>
                                        

                                          <select name="idmuestra" required="true" class="form-control" >
                                            <option value=""> Seleccione tipo de muestra</opction>
                                                 <?php
                                        foreach ($muestra  as $value) {
                                            echo "<option value='" . $value->id_tipo_muestra . "'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                        </select>
                                      
                                         </div>       
                                     
                                </div>
                               
                               

                            </div>
                           
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Ingrese el valor</label>

                                   <?php echo form_textarea($resultado); ?>
                                    
                                     <?php echo form_error('resultado','<div class="alert alert-danger alert-dismissible"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                </div>
                              
                            </div>
                          </div>
                       <?php 
                            if(isset($mensaje)){
                               
                                echo $mensaje;
                               
                            }
                            ?>
                     
                        <div class="panel-footer"> <button type="submit"  id="btnAgregar_componente" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Agregar Valor</button> </div>
                            
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
                    <?php echo form_open(base_url("index.php/c_valor/buscar")); ?>
                    <center><span ><?php if(isset($sistemamsj)){ echo $sistemamsj;} ?></span></center>
                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Selecione Sistema</span>
                                        

                                        <select id="select_sistema" onchange="getSistema(this);" name="sistema_select" required="true" class="form-control" >
                                            <option value="seleccione">Seleccione</option>
                                                 <?php
                                        foreach ($sistema  as $value) {
                                            echo "<option value='" . $value->id_sistema . "'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                        </select>
                                      
                                         </div> 
                    

                </div>
                  <?php echo form_close(); ?>
            </div>
            
            <!-- tabla antigua  -->
            
           
          
            <div  class="table-responsive">          
                <div  class="panel-body">
                    <div class="col-md-12">
                            
                        <div id="panelsistema" class="table-responsive">
                        <table id="tbl_valores" class="table table-bordered">
                          <thead >  
                            <tr>
<!--                                <th>Opciones</th>
                                <th>Id sistema</th>
                                <th>Id valor</th>
                                <th>Resultado</th>
                                <th>Id componente</th>
                                <th>Nombre componente</th>
                                <th>Fecha</th>-->
                                
                            </tr>
                            </thead>
                        </table>
                        </div>
                        
                                

                    </div>
                </div>
            </div>
<!--   fin de la tabla antigua --->
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

        <form id="form_updatevalor">
          <div class="modal fade" id="modal_formulario_valor" tabindex="-1" role="dialog" 
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
                    Actualizar valor
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="msj"></div>
                <div class="input-group">
                     <span class="input-group-addon"  id="basic-addon1">Código valor</span>
                     <input type="number" class="form-control" disabled="true" id="cod_v"  maxlength="10" required="true"  aria-describedby="basic-addon1">
                 </div>       
           
              <br>
               <div class="input-group">
               <span class="input-group-addon" id="basic-addon2">Nombre componente</span>    
               <input type="text" class="form-control" id="componente" disabled="true"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
               </div>
              
              <br>
              <div class="input-group">
               <span class="input-group-addon" id="basic-addon2">Fecha registro</span>    
               <input type="text" class="form-control" id="fecha" disabled="true"  required="true" placeholder="Ingrese.." aria-describedby="basic-addon2">
               </div>
              <br>
               <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">Resultado actual</span>    
                  <textarea  id="resultado_v" class="form-control" disabled="true" required="true"  placeholder="Ingrese.." aria-describedby="basic-addon2"></textarea>
                 
               </div>
              <br>
               <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">Ingresa el nuevo resultado para modificar</span>    
                  <textarea  id="resultado_valor_nuevo" class="form-control"  required="true"  placeholder="Ingrese.." aria-describedby="basic-addon2"></textarea>
                 
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
        
        
        
<div id="modaldelete_valor" class="modal fade" role="dialog">
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
                        <input type="hidden" id="id_valor">

                        <button type="button" class="btn btn-danger grupo1" onclick="eliminar_valor_ajax()"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                        <button type="button" class="btn btn-default grupo2" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                        <button type="button" class="btn btn-default grupo1"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"> </span> Cancelar</button>
                    </div>
                </div>

            </div>
        </div>
       
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


   
            
   
    <!-- -->
  
       
   
</div>
