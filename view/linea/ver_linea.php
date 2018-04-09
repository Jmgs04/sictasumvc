<ol class="breadcrumb">
  <li><a href="index.php?c=Interesados">Linea</a></li>
  <li class="active"><?php echo  $alm->nombre_linea; ?></li>
</ol>

<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Datos de la Linea</a></li>
              <!--<li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Inmueble</a></li>-->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                     <span class="username">
                          <a href="#"><?php echo  $alm->nombre_linea; ?></a>

                        </span>
                    <span class="description"><label><b>Registrado desde el </b></label> <?php 
                    setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                    echo  strftime(" %d de %B de %Y", strtotime($alm->fing)); ?></span>
                    <span class="description">
                  <label><b>Correo Electr&oacute;nico:</b></label> <?php echo  $alm->correo; ?>
                  </span>
                  <span class="description">
                   <label><b>Tel&eacute;fono:</b></label> <?php echo  $alm->tlf; ?></span>
                   <span class="description">
                   <label><b>Informaci&oacute;n:</b></label> <?php echo  $alm->notas_interesado; ?></span>
                  </div>                
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-blue">
                          Consulta realizada el <? setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                          if(!empty($alm->fc)){                   
                          echo strftime(" %d de %B de %Y", strtotime($alm->fechac));} ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="glyphicon glyphicon-triangle-right bg-blue"></i>

                    <div class="timeline-item">
                    <!--<h3 class="timeline-header no-border"><label>Direcci&oacute;n:<? echo $alm->direccion; ?></label></h3>-->
                    <div class="timeline-body">
                       <span class="post"> Propiedad ubicada en <span id="direccion"></span>, tipo  <span id="operacion"></span>.</span><br>
                       <span class="post"> Su valor es de <span id="valor"></span>
                      </div>
                   <!--<span class="timeline-body">
                   
                   <span class="timeline-body">
                   <label><b>Valor: </b></label><span id="valor"></span></span>                  
                   <div class="timeline-body">
                   <label><b>Vendedor:</b></label> <?php echo  $alm->nombre_vendedor; ?></div> --> 
                    
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                    <div class="timeline-bod">Se desea este inmueble para <?php echo  $alm->motivo; ?> y ser&aacute; ocupado por <?php if($alm->pax>1){ $pax='personas';} else if($alm->pax==1){$pax='persona';} echo  $alm->pax.' '.$pax;  ?> durante <? if($alm->meses>1){ $m='meses';} else if($alm->meses==1){$m='mes';} echo $alm->meses. ' '. $m ?> 
                      </div>
                      
                    </div>
                  </li>
                 
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">Fecha de ingreso: 
                          <? setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                          if(!empty($alm->fi_)){                    
                          echo strftime(" %d de %B de %Y", strtotime($alm->fechai));}
                          else echo "N/D"; ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="glyphicon glyphicon-tags bg-purple"></i>

                    <div class="timeline-item">
                      <div class="timeline-body"><label><b>Clasificaci&oacute;n:</b></label>  <? echo $alm->clas;?></div>
                     
                      
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="glyphicon glyphicon-ok-circle bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

            </div>
             <div class="modal-footer">
                            <a href="index.php?c=Linea" type="button" class="btn btn-default" >Cerrar</>
                          </a>
            <!-- /.tab-content -->
          </div>