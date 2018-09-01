<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio de Sesion | </title>
    <style >
       html, body {
            margin: 0;
            padding: 0;
        }
        .main2 {
            background-image: url("production/images/lentes1.png");
            background-position: bottom;
            overflow: hidden;
            height: 100vh;

        }

    </style>
    <?php
      include "ComponentesForm/estilos.php";
    ?>
    <!--<link href="build/css/estiloLogin.css" rel="stylesheet"/>-->
  </head>

  <body class="main2" >
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <h1 class="text-center"><img width="319" height="120" src="production/images/SiceoL.png "></h1>
          <section class="login_content">

            <form class="cuadro">

              <h1 style="color:#FFFFFF">Inicio de Sesi&oacuten</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Clave" required="" />
              </div>
              <div>
              <div class="checkbox text-center">
                            <label>
                              <input style="color:#FFFFFF" type="checkbox" class="flat" checked="checked"> Recu&eacuterdame
                            </label>
              </div>
                <a style="color:#000000" class="btn btn-default submit" href="index.php">Iniciar</a>
                <a style="color:#FFFFFF" class="reset_pass" href="recuperar.php">Has perdido la contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  
                  <p style="color:#FFFFFF; " >©2018 Todos los Derechos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
      </div>
  </body>
</html>
