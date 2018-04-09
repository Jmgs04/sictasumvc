<?php 
require_once 'model/m_linea.php';
 class Linea_Controller{
    
   private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Linea();
    }

//-----------------------------------------------------------------------------------------------------    
    public function Index(){
        require_once 'view/headersystem.php';
        require_once 'view/linea/linea.php';
        require_once 'view/footer.php';
    }
//------------------------------------------------------------------------------------------------------------- 
     public function Ver(){
        $alm = new Linea();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
    
        require_once 'view/linea/ver_linea.php';
        //require_once 'view/footer.php';
    }    


//-----------------------------------------------------------------------------------------------------    
    public function Editar(){
        $alm = new Linea();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);

        require_once 'view/headersystem.php';
        require_once 'view/linea/linea-editar.php';
        require_once 'view/footer.php';
    }
}

//-----------------------------------------------------------------------------------------------------    
    public function Agregar(){
        $alm = new Linea();
                
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
            }
       
        require_once 'view/headersystem.php';
        require_once 'view/linea/linea-editar.php';
        require_once 'view/footer.php';
    }

} // fin clase
?>