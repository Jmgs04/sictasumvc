<div class="container" style="margin-top:150px;">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Inicio de Sesión</h3>
        </div>
          <div class="panel-body">       
               <form method="post" action="index.php?c=principal&a=inicia">
                    <fieldset><div id="alertBoxes"></div>
                <div class="form-group">
                  <input class="form-control" placeholder="usuario" name="usuario" id="usuario" type="text" autofocus required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Contraseña" name="npassword" id="npassword" type="password" value="" required>
              </div>
              <input class="btn btn-lg btn-primary btn-block" type="submit" name="login_userbttn" id="login_userbttn" value="Iniciar sesión">
            </fieldset>
              </form>
              <p></p>              
          </div>
      </div>
    </div>
  </div>
</div>