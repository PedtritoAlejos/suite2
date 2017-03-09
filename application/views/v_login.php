
    <body>
       <div class="container" >  
            <div class="col-lg-4 col-md-12 col-sm-2"></div>
            <div class="col-lg-4 col-md-12 col-sm-8">
                <div class="logo">
<!--                    <img src="https://s16.postimg.org/3wg150ysl/download.jpg"  alt="Logo"  > -->
                    <img src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAhwAAAAJDZkYzI4ODMzLTFlOTktNDgwNS1iNDhhLTg2NThhOGJmMGNiYw.jpg" 
                         alt="Logo" style="height:200px" > 
                </div>
                <div class="row loginbox">                    
                    <div class="col-lg-12">
                        <span class="singtext" >Iniciar Sesión </span>   
                    </div>
                  <?php echo form_open(base_url("index.php/c_crud/iniciar_sesion")) ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                   <?php  if(validation_errors()){
      echo "<div class='alert alert-danger alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong>¡Error!</strong> ".validation_errors()."</div>";
  }
      
      ?>

                            
 </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     
                            <?php echo form_input($correo); ?>
                        
                    </div>
                      
                          
                    <div class="col-lg-12  col-md-12 col-sm-12">
                        <div class="form-group">
                         <?php echo form_input($clave); ?>&nbsp;
                            <label class="form-check-label">
                                <div class="checkbox-inline">
                                <input  type="checkbox" id="show" >   <span ><a>Mostar contraseña</a></span> 
    </label>
                        
                      </div>  
                      </div>  
                    </div>
                    <div class="col-lg-12  col-md-12 col-sm-12">
               
                        <input type="submit" name="submit" class="btn  submitButton" value="Ingresar">
                    </div>      
                         <div class="col-lg-12 col-md-12 col-sm-12">
                          <?php  if($this->session->flashdata('usuario_incorrecto'))
					{
					?>
					<p> <?php echo "<div class='alert alert-danger alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong>¡Error!</strong> ".$this->session->flashdata('usuario_incorrecto')."</div>"?></p>
					<?php
					}
					?>
                </div>
                </div>
                <div class="row forGotPassword">
                    <a href="#" >Olvide correo / contraseña </a> 
                </div>
                 <?php echo form_close(); ?>
                <br>                
                <br>
                <footer  class="footer">                
                  
                    <p >©2017 AdvisorIT   todos los derechos reservados</p>                 
                </footer> <!--footer Section ends-->

            </div>
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
        </div>
          <script src="<?php echo base_url("plantilla/js/jquery.js")?>"></script>
           <script src="<?php echo base_url("plantilla/js/bootstrap.min.js"); ?>"></script>
    </body>
     
</html>
