<?php
 class ModelAdmin {
	
	private $server='localhost';
	private $dbname='demography';
	private $username='root';
	private $password;
	private $conndb;

	/*
	*connexion avec pdo
	*
	*/
	private $serverpdo="mysql:host=localhost;dbname=demography";
	//private $dbnamepdo='demography' ;
	private $usernamepdo='root';
	private $passwordpdo;
	private $db;
	
	public function __construct()
	{
     try
      {
      	
     	$this->db=new PDO($this->serverpdo,$this->usernamepdo,$this->passwordpdo);
     	$this->conndb=new mysqli($this->server,$this->username,$this->password,$this->dbname);
     	
      } catch (Exception $e)
      {
     	$info='echec de chargement'.$e->getmessage();
      }
	}
	 public function addadress(){

  }
  public function editadress(){

  }
  public function updateadress(){

  }
  public function deleteadress(){
  	
  }
}

	?>
