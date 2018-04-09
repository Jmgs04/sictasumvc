     
  </div> <!-- /container -->

    <!--<footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; 2016 Inmobiliaria Calot, Design y developed by ItDriver.com.</p>
      </div>
    </footer>-->

        
       <!-- <script src="assets/js/bootstrap.min.js"></script><script src="assets/js/jquery-ui/jquery-ui.min.js"></script><script src="assets/js/bootstrap-modal.js"></script><script src="js/lib/respond.js"></script> <script src="assets/js/ini.js"></script>
       
             





<!-- Slimscroll 
<script src="assets/js/js/jquery.slimscroll.min.js"></script>
<!-- FastClick 
<script src="assets/js/js/fastclick.js"></script>
<!-- AdminLTE App 
<script src="assets/js/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes
<script src="assets/js/js/demo.js"></script>-->
       


    
    <script src="assets/js/jquery.anexsoft-validator.js"></script>
    <script type="text/javascript">
    	//--------------------------------------------------------------------------------------------------------------
    function getAbsolutePath() {
        var loc = window.location;
        var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
        return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
    }
//-------------------------------------------------------------------------------------------------------------
function notificaciones(){
     
                $.getJSON(getAbsolutePath()+'/model/leer_notificaciones.php',respuesta);

function respuesta(data){
    if(data!= null){
       $("#nombre").val(data[0].estado);
       $("#telefono").val(data[0].tlf);
// Aqui debo enviar el id de la visita
            Push.create('Nueva Notificacion', {
            body: data[0].estado,
            icon: 'icon.png',
            timeout: 8000,                  // Timeout before notification closes automatically.
            vibrate: [100, 100, 100],       // An array of vibration pulses for mobile devices.
            /*onClick: function() {
                // actualizar base de datos 
                $.getJSON(getAbsolutePath()+'/model/actualizar_notificaciones.php?id='+data[0].visita_id,respuesta);
                console.log(this);
            } */ 
        });
}
/*else{

}*/
}
 };
//----------------------------------------------------------------------------------------------------------------
 //setInterval(notificaciones, 10000);

    </script>
    </body>
</html>