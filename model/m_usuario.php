<?php
//require_once 'm_database.php';
class Usuario
{
	private $pdo;
    
    public $id;
    public $nomb_usu;
    public $email;
    public $login;
    public $clave;
    public $nivel;
    public $status_id;
    public $user_type_id;
	
    /*public $fCreacion;
	public $creadoPor;
	public $fModificacion;
	public $modificadoPor;
	
	public $nombre_vendedor;
	public $tlf_vendedor;
	public $direccion_v;
    public $acceso;
    public $color;
    public $nivel;
    public $tipo_coordinador;
    public $id_vendedor;*/


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

//--------------------------------------------------------------------------------------------------------------------------    
	public function logueo_usuario($correo, $pass){		
		try{
			 $stm = $this->pdo->prepare("SELECT nomb_usu, clave,nivel,status_id,user_type_id FROM usuario WHERE nomb_usu=? and clave=?");
			 $stm->execute(array($user, $pass));
			 return $stm->fetch(PDO::FETCH_OBJ);
			
			}catch(Exception $e){			
				die($e->getMessage());
			}					
	}		

//-----------------------------------------------------------------------------------------------------------------------------    
	function validar_login($usu,$pass){

		try{
		
			$stm = $this->pdo->prepare("SELECT nomb_usu, clave, nivel,status_id,user_type_id FROM usuario WHERE nomb_usu=? and clave=? ");
			 $stm->execute(array($usu, $pass));
			$total_reg = $stm->rowCount();
			
			 if ($total_reg> 0) {
			 	return $stm->fetch(PDO::FETCH_OBJ);
			 }else{
			 	return $stm= "error";
			 }
			 
			 
			
			}catch(Exception $e){			
				die($e->getMessage());
			}
		}

//-------------------------------------------------------------------------------------------------------------------   
    public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM v_usuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
//-------------------------------------------------------------------------------------------------------------------   
    public function Listar_tipo_coordinador()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM nivel_acceso ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
//-------------------------------------------------------------------------------------------------------------------   
    public function Listar_vendedor()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vendedor left join usuario on vendedor.id_vendedor=usuario.id_vendedor where usuario.id_vendedor is null");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

//-------------------------------------------------------------------------------------------------------------------   
    public function Listar_nivel()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM nivel_usuario order by id desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

//-------------------------------------------------------------------------------------------------------------------   
    public function Listar_estado()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM status_usuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

//-----------------------------------------------------------------------------------------------------------------  
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM v_usuario WHERE id_usu = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


//---------------------------------------------------------------------------------------------------------------------------------    
	public function Obtener_usuario($correo){
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT login, pass,user_type_id,id,acceso FROM usuario WHERE correo = ?");
			          
			$stm->execute(array($login));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
//-----------------------------------------------------------------------------------------------------------------------------
	public function Activar_u($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("UPDATE usuario SET status_id = 1 WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

//-----------------------------------------------------------------------------------------------------------------------------
	public function Inactivar_u($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("UPDATE usuario SET status_id = 2 WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


//-----------------------------------------------------------------------------------------------------------------------------
	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuario WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
//-------------------------------------------------------------------------------------------------------------------   
	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						nombre          = ?, 
						email           = ?,
						login           = ?, 
						pass        = ?,
                        fCreacion       = ?,
                        creadoPor       = ?,
                        fModificacion   = ?,
                        modificadoPor   = ?,
						user_type_id    = ?,
						status_id       = ?,
						acceso 			= ? 
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(  
						$data->nombre,
						$data->email,
						$data->login,
						$data->pass,
						$data->fCreacion,
						$data->creadoPor,
						$data->fModificacion,
						$data->modificadoPor,
					    $data->user_type_id,
						$data->status_id,
						$data->acceso,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


//-------------------------------------------------------------------------------------------------------------------
	public function Registrar(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (nombre,email,login,pass,fCreacion,creadoPor,fModificacion,modificadoPor,status_id,user_type_id,acceso,id_vendedor) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
						$data->nombre,
						$data->email,
						$data->login,
						$data->pass,
						$data->fCreacion,
						$data->creadoPor,
						$data->fModificacion,
						$data->modificadoPor,
						$data->status_id,
				 		$data->user_type_id,
				 		$data->acceso,
				 		$data->id_vendedor
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


//----------------------------------------------------------------------------------------------------------------------
public function encriptar($cadena){
    $key='lox1';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
 
}
//----------------------------------------------------------------------------------------------------------------------- 
public function desencriptar($cadena){
     $key='lox1';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

}


