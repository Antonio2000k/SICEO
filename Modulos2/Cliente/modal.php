
<?php 


  $cambio=$_REQUEST["cambio"];
  if($cambio === "fecha"){

?>
  <div class="item form-group" > 
                  <button type="button" class="btn btn-info " id="daterange-btn2" style="float: right;">
                    <i class="fa fa-calendar"></i> Rango
                    <i class="fa fa-caret-down"></i>
                  </button>
                  
                  <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha Inicio*</label>
                  <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" name="rango1" id="rango1"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Fecha Inico"  autocomplete="off" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  
                        
                </div>
                <br><br>
                <div class="item form-group"> 

                  <label class="control-label col-md-3 col-sm-2 col-xs-12">Fecha Final*</label>
                  <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" name="rango2" id="rango2" class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Fecha Inico"  autocomplete="off" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                        
                </div>
                <br><br><br>
    
     <?php
   }

   if($cambio === "sexo"){
?>

    <div class="item form-group" > 
                  <label class="control-label col-md-1 col-sm-2 col-xs-12">Sexo*</label>
                  <div class="col-md-10 col-sm-4 col-xs-12 form-group has-feedback">
                    <div class="col-md-4 col-xs-12 col-sm-4">
                      <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M"/>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-4">
                      <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" />
                    </div>
                  </div>
                </div>
                            
                            
                                
                 <br><br>
     <?php
   }

   if($cambio === "edadE"){
?>
<div id="divE" hidden>
  <div class="modal-body"  >
    <div class="item form-group" > 
      <label class="control-label col-md-3 col-sm-2 col-xs-12">Edad*</label>
      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
        <input type="text" name="edadEs" id="edadEs" onblur="verBoton();"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Edad"  autocomplete="off" >
        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
                            
    <br><br>
  </div>
  <div class="modal-footer">
    <button class="btn btn-info btn-icon left-icon pull-left" id="impri"' data-dismiss="modal" onclick="RepEdad('edadEsp')" > <i class="fa fa-print"></i> Imprimir</button>
                    
    <button type="button" class="btn btn-round btn-warning pull-right" data-dismiss="modal">Cancelar</button>
  </div>
</div>
     <?php
   }
   if($cambio === "edadMe"){
?>

    <div class="item form-group" id="divEme" hidden> 
      <label class="control-label col-md-3 col-sm-2 col-xs-12">Menor a*</label>
      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
        <input type="text" name="edadMe" id="edadMe"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Menor a"  autocomplete="off" >
        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
                            
                            
                                
                 <br><br>
     <?php
   }
   if($cambio === "edadMa"){
?>

    <div class="item form-group" id="divEma" hidden> 
      <label class="control-label col-md-3 col-sm-2 col-xs-12">Mayor a*</label>
      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
        <input type="text" name="edadMa" id="edadMa"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Mayor a"  autocomplete="off" >
        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
                            
                            
                                
                 <br><br>
     <?php
   }
   if($cambio === "edadR"){
?>

    <div class="item form-group" id="divER" hidden > 
      <label class="control-label col-md-3 col-sm-2 col-xs-12">Menor a*</label>
      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback" >
        <input type="text" name="edadR1" id="edadR1"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Menor a"  autocomplete="off" >
        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
      </div>
      <br><br><br>
      <label class="control-label col-md-3 col-sm-2 col-xs-12">Mayor a*</label>
      <div  class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback" >
        <input type="text" name="edadR2" id="edadR2"  class="form-control has-feedback-left" class="form-control col-md-6 col-xs-12" value="" data-validate-length-range="6" data-validate-words="2" placeholder="Mayor a"  autocomplete="off" >
        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
                            
                            
                                
                 <br><br>
     <?php
   }
   ?>
  