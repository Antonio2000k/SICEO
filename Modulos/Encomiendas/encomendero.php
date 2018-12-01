<div style="text-align:center; background: linear-gradient(to top,#000104d6 0,#03016b 50%)">
  <div class="clearfix"></div>
  <h3 align="center" style=" color: white">Datos Encomendero</h3>
  <div class="clearfix"></div>
</div>

<br>

<div class="row">
  <div class="item form-group">
    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
      <label style="text-align:left" class="control-label col-md-2 col-sm-2 col-xs-12">Nombre*</label>
      <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
        <input type="tel" class="form-control has-feedback-left"  id="nombre" class="form-control" data-validate-length-range="8,20" data-validate-words="2" name="nombre" placeholder="Nombre del Encomendero" onkeypress="return soloLetras(event)" autocomplete="off">
        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
  </div>

  <div class="item form-group">
    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
      <label style="text-align:left" class="control-label col-md-2 col-sm-2 col-xs-12">Apellidos*</label>
      <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control has-feedback-left"  id="apellido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="apellido" placeholder="Apellidos del Encomendero" onkeypress="return soloLetras(event)" autocomplete="off">
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
  </div>

  <div class="item form-group">
    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
      <label style="text-align:left" class="control-label col-md-2 col-sm-2 col-xs-12">Telefono*</label>
      <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
        <input type="tel" class="form-control has-feedback-left"  id="telefono" class="form-control col-md-3 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefono" placeholder="Telefono" data-inputmask="'mask': '2999-9999'" autocomplete="off" onblur="vali('tele');">
        <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
  </div>

  <div class="item form-group">
    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
      <label style="text-align:left" class="control-label col-md-2 col-sm-2 col-xs-12">Celular*</label>
      <div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
        <input type="tel" class="form-control has-feedback-left"  id="telefonoc" class="form-control col-md-7 col-xs-12" data-validate-length-range="8,20" data-validate-words="2" name="telefonoc" placeholder="Celular" data-inputmask="'mask': '9999-9999'" autocomplete="off" onblur="vali('celular');">
        <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
  </div>
</div>
