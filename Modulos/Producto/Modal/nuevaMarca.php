<!-- Modal -->
<div class="modal fade" id="nuevaMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4> </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body"> 
    <form class="form-horizontal form-label-left" id="formMarca" name="formMarca" method="post" action="ajax/guardarMarca.php">
        
        <div class="item form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-3 col-sm-4 col-xs-12"> Nombre* </label>
                <div class="col-md-8 col-sm-8 col-xs-12">                                    
                        <input type="text" class="form-control has-feedback-left" id="nombreM" class="form-control col-md-7 col-xs-12" name="nombreM" placeholder="Ingrese el nombre" autocomplete="off" onkeypress="return soloLetras(event)" onblur="verificarCodigo('marca');"> <span class="fa fa-toggle-right form-control-feedback left" aria-hidden="true"></span>                       
                </div>
        </div> 

            <div class="row text-center">
                <button type="button" class="btn btn-primary" id="guardar_datos" onclick="verificarM('guardar');"><i class="fa fa-save"></i><span>  Guardar</span></button>
            </div>

        </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-close"></i><span>  Cerrar</span></button>
      </div>
    </div>
  </div>
</div>