      <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Formulario
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Formulario
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
 
                       <?php echo form_open(base_url("index.php/c_crud/agregar_datos")) ?>
                           
                        
                        <div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Datos cliente nuevo</h3>
  </div>
  <div class="panel-body">
    <div class="container col-md-12">
        <div class="col-md-6">
               <div class="form-group">
                <label>Ingrese el nombre del cliente</label>
                <input required="true" name="nombre_cliente" pattern="[A-Za-z- ]{3,25}"  class="form-control">
                </div>
               <div class="form-group">
                <label>Ingrese una especificación del cliente</label>
                <input required="true" name="descripcion_cli"  class="form-control">
                </div>
             <div class="form-group">
                <label>Ingrese la fecha de inicio del servicio</label>
                <input required="true" name="f_inicio" type="date" class="form-control"/>
                </div>
            <div class="form-group">
                <label>Ingrese la fecha termino del servicio</label>
                <input  required="true" name="f_final" type="date" class="form-control"/>
                </div>
<!--        <div class="form-group">
                <label>Ingrese el propósito</label>
                <input  required="true" class="form-control"/>
                </div>
        <div class="form-group">
                <label>Ingrese la descripción del propósito</label>
                <textarea  required="true" class="form-control"></textarea>
                </div>-->
           </div> 
        <!-- otro campo -->
        <div class="col-md-6">
               <div class="form-group">
                <label>Especifique el sistema al que se le realizara el servicio</label>
                <input required="true" name="nombre_servicio" class="form-control">
                </div>
             <div class="form-group">
                <label>Ingrese una breve descripción del sistema </label>
                <textarea  required="true" name="descripcion_sistema" class="form-control">
                    
                </textarea>
                </div>
              <div class="form-group">
                <label>Seleccione el tipo servicio</label>
                 <select class="form-control" name="tipo_servicio" required="true">
                     <option value="" required="true">Seleccione</option>
                                     <?php 
                                       foreach ($tipos_servicios as $value) {
                                       echo "<option value='".$value->id_tipo_servicio."'>".$value->nombre."</option>";
                                }  
                                   ?>
                                </select>
                </div>
            </div>
              
             
            
     
        
             
              
</div>
  </div>
    <div class="panel-footer"> <button type="submit" class="btn btn-primary">Ingresar datos</button> </div>
    <?php echo form_close(); ?>
</div>
</div>
                        
                  

                            <div class="form-group">
                                <label>Ingrese el resultado del componente</label>
                              
                                <textarea class="form-control" placeholder="Ingrese aqui el resultado"></textarea>

                            </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#agregar_com"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo componente</button>

<div id="agregar_com" class="collapse">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Nuevo componente</h3>
  </div>
  <div class="panel-body">
    <div class="container col-md-12">
               <div class="form-group">
                <label>Ingrese el nombre del componente</label>
                  <input class="form-control">
                </div>
               <div class="form-group">
                <label>Ingrese una descripción del componente</label>
                <input required="true" class="form-control">
                </div>
               <div class="form-group">
                <label>Tipo de componente</label>
                <select class="form-control" name="cliente" required="true">
                     <option value="" required="true">Seleccione</option>
                                     <?php 
                                       foreach ($tipos_componentes as $value) {
                                       echo "<option value='".$value->id_tipo_componente."'>".$value->nombre."</option>";
                                }  
                                   ?>
                                </select>
                </div>
      
             
              
</div>
  </div>
    <div class="panel-footer"> <button type="submit" class="btn btn-primary">Aceptar</button> </div>

</div>
</div>
                        </div>

           
                    </div>
                </div>
          
            </div>
         
        </div>
