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
                                        <span class="input-group-addon" id="basic-addon1">Sistema</span>
                                        

                                        <select onchange="this.form.submit()" name="sistema_select" required="true" class="form-control" >
                                            <option value=""> Seleccione un sistema</opction>
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
            <div class="table-responsive">          
                <div class="panel-body">
                    <div class="col-md-12">
                            <?php  if(isset($datos)) {
                                ?>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                           
                            <tr>
                                <th>Id valor</th>
                                <th>Resultado</th>
                                <th>Id componente</th>
                                <th>Nombre componente</th>
                                <th>Fecha</th>
                                <th>Eliminar</th>
                                <th>Modificar</th>
                            </tr>
                            <?php 
                             foreach ($datos  as $value) {
                                 echo "<tr>";
                                 echo "<td>".$value->id_valor."</td>";
                                 echo "<td>".$value->resultado."</td>";
                                 echo "<td>".$value->id_componente."</td>";
                                 echo "<td>".$value->nombre_componente."</td>";
                                 echo "<td>".$value->fecha."</td>";
                                 echo "<td>";
                                 echo form_open(base_url("index.php/c_valor/eliminar"));
                                 echo form_hidden("id_valor", $value->id_valor);
                                 echo form_hidden("id_sistema", $value->id_sistema);
                                
                                 echo form_submit("btn_eliminar","Eliminar","class='btn btn-danger'");
                                 echo form_close();
                                 echo "</td>";
                                 echo "<td>";
                                 echo form_open(base_url("index.php/c_valor/reenviar"));
                                 echo form_hidden("id_valor", $value->id_valor);
                                 echo form_hidden("resultado", $value->resultado);
                                 echo form_hidden("componente", $value->nombre_componente);
                                 echo form_hidden("id_sistema", $value->id_sistema);  
                                 echo form_submit("btn_actualizar","Actualizar","class='btn btn-success'");
                                 echo form_close();
                                 echo "</td>";
                                 echo "</tr>";    
                                   }
                           
                            
                            
                            ?>
                            
                        </table>
                        </div>
                        
                                <?php 
                            } ?>
                       

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


       

        
           

      
    </div>


   
            
   
    <!-- -->
  
       
   
</div>
