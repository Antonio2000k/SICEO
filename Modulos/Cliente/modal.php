<?php 
  $cambio=$_REQUEST["idd"];
  if($cambio === "fecha"){
?>

    
     <?php
   }

   if($cambio === "sexo"){
?>

    <div class="item form-group" > 
      <label class="control-label col-md-1 col-sm-2 col-xs-12">Sexo*</label>
      <div class="col-md-1 col-sm-4 col-xs-12 form-group has-feedback">
        <div class="col-md-4 col-xs-12 col-sm-4">
          <label>Masculino</label>  <input type="radio" class="flat" name="genero" id="generoM" value="M"/>
        </div>
        <div class="col-md-4 col-xs-12 col-sm-4">
          <label>Femenino</label>  <input type="radio" class="flat" name="genero" id="generoF" value="F" />
        </div>
      </div>
    </div>
                
                
                    
     <br><br><br>
     <?php
   }
   ?>