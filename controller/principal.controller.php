<?php
require_once 'model/m_usuario.php';

class Principal_Controller{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Index(){
        if(!session_id() === ''){
             header('Location: index.php?c=principal&a=inicio');

        }else{
           require_once 'view/header.php';
            require_once 'view/inicia_sesion.php';
            //echo phpversion();
        }

        
        require_once 'view/footer.php';
    }

//-----------------------------------------------------------------------------------------------    
    public function Inicia(){
        if(!isset($_SESSION)) {
        
		$alm = new Usuario();
       
		$usuario = $_REQUEST['usuario']; //$_REQUEST['correo'];
		$pass = $_REQUEST['npassword'];//$this->model->encriptar($_REQUEST['npassword']);
        
    	$alm= $this->model ->validar_login($usuario,$pass);

        if ($alm == "error") {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Usuario / Contraseña incorrectos!');\n";
            echo "window.location='index.php'";
            echo "</script>";
            
        }else{
           if ($alm->status_id == 1) {
            if($alm->user_type_id==3){
                 echo "<script language=\"JavaScript\">\n";
            echo "alert('Usuario no autorizado para ingresar al sistema! Contacte al administrador');\n";
            echo "window.location='index.php'";
            echo "</script>";}
          else{
            session_start();
            $_SESSION['username']= $alm->nomb_usu;
            $_SESSION['user_type']=$alm->user_type_id;
            //$_SESSION['user_id']=$alm->id;
             $_SESSION['acceso']=$alm->nivel;
            if( $_SESSION['user_type']== 1 or  $_SESSION['acceso'] == 1){
                 $_SESSION['entrada'] = 1;
            }
           header('Location: index.php?c=principal&a=inicio');
            
            }
        }
          else{
           echo "<script language=\"JavaScript\">\n";
            echo "alert('Usuario inactivo! Contacte al administrador');\n";
            echo "window.location='index.php'";
            echo "</script>";   
      
        }
    	
    }
}else{
          /*  require_once 'view/headersystem.php';
            require_once 'view/pplsystem.php';
            require_once 'view/footer.php';    */
            echo "redirec";
}

}

//--------------------------------------------------------------------------------------------------	
	public function validar_datos($user){	
		if(preg_match("/(^[a-z]{1,20})(?!\s)([\w]{0,20}$)/i",$user)){ 
			//$user=strtolower(htmlentities(trim(strip_tags($user))));		
			//$this->pass=md5($pass);			
			//$this->logueo_usuario();
			$retorno = strtolower(htmlentities(trim(strip_tags($user))));
		}
		else{			
			$retorno="formato_invalido";			
		}	
		return $retorno;						
	}
    
//--------------------------------------------------------------------------------------------------	
	public function Inicio(){
		session_start();
        require_once 'view/headersystem.php';
        require_once 'view/pplsystem.php';
        require_once 'view/footer.php';		
	}
	
//---------------------------------------------------------------------------------------------------    
	public function Salir(){
        	session_start();
	        session_destroy();
			header('Location: index.php');
			exit(0);            
    }
    
}