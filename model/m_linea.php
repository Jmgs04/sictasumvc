<?php 
class Linea
{
	private $pdo;
    
    public $cod_linea;
    public $nombre_linea;
    public $ruta;   
    public $tipo_ruta;
    public $costo_pasaje;
    public $estado;
    public $cantidad;
    public $anden;
    public $tipo_anden;
    public $cod_rel;
    public $num_vehi;
	
  

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

//-------------------------------------------------------------------------------------------------------------------   
    public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM v_linea");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
//--------------------------------------------------------------------------------------    
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM v_vehilinea WHERE cod_rel = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

//--------------------------------------------------------------------------------------    
	public function Num_vehi($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT count(cod_vehi) FROM v_vehilinea WHERE cod_rel = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
} 


?>