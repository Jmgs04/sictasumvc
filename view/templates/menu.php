

     <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="container">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button>

          <a class="navbar-brand" href="#top">

             <img src="assets/images/logo.png" alt="logo SICTASU" title="SICTASU">

          </a>

        </div>

        <div id="navbar" class="collapse navbar-collapse">          

          <ul class="nav navbar-nav navbar-right">

 			<li><a href="index.php?c=Principal&a=Inicio">Inicio</a></li>

                  <!--<li><a href="index.php?c=Propiedades"><i class="fa fa-building"></i> Inmuebles</a></li>
                  <li><a href="index.php?c=Configuracion"><i class="fa fa-gear"></i> Configuración</a></li>
            <li><a target="_blank" href="https://docs.google.com/spreadsheets/d/1niD-B6eo8CnFNIL_2KkNYHx2prPj1nbqAKnfkXqLdh4/edit#gid=2016583888">Administracion</a></li>  -->

            <?php if ($rol=='1'){ ?>

            <li><a href="index.php?c=Usuario">Usuarios</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuracion
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li ><a href="index.php?c=Vendedor"><i class="fa fa-users"></i>Vendedores</a></li>
                  
                </ul>
              </li>


            

            <?php } ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>&nbsp;<? echo $usuario;?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li ><a href="index.php?c=Principal&a=Salir"><i class="fa fa-"></i>Salir</a></li>
                  
                </ul>
              </li>

                    
        </div><!--/.nav-collapse -->

      </div>

    </nav>

   

