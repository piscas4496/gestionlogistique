<?php 
    class Permission {
	/*
  *connexion with mysqli 
  *
  */
	private $server='localhost';
	private $dbname='gestionlogistique';
	private $username='root';
	private $password;
	private $conndb;

	/*
	*connexion with pdo
	*
	*/
	private $serverpdo="mysql:host=localhost;dbname=gestionlogistique";
	//private $dbnamepdo='demography' ;
	private $usernamepdo='root';
	private $passwordpdo;
	private $db;

	//===============end of daclaration of databse=========================
	//===============start declaration of element class====================

	private $idpermis;
	private $designation;
 	/*seting of all variable*/
	public function setidpermis($idpermis){ $this->idpermis=$idpermis;}
	public function setdesignation($designation){ $this->designation=$designation; }

	/* get of all variable of class*/

	public function getidpermis(){ return $this->idpermis; }
	public function getdesignation(){ return $this->designation; }
	
	/*building of contruct function*/	
  	public function __construct($idpermis=0,$designation="")
	{
     try
      {	
      	//contruct of pdo
     	$this->dbpdo=new PDO($this->serverpdo,$this->usernamepdo,$this->passwordpdo);
     	//construct of mysqli
     	$this->conndb=new mysqli($this->server,$this->username,$this->password,$this->dbname);

         //consturct of variables for our class
     	$this->id=$id;
     	$this->designation=$designation;
     	
      } catch (Exception $e)
      {
     	$info='echec de chargement'.$e->getmessage();
      }
	}

	/*
	start of function for our processing class
	 *function insert permission
	*/
	public function insertpermis(){
		//this insert we will use pdo has database
		try {
			$insert=$this->dbpdo->prepare("INSERT INTO Permission(designation) VALUES (?)");
			return $insert->execute([$this->designation]);
			echo "<script>alert("Insertion avec succes");<script>";		
			} catch (Exception $e) {
			 return $e->getmessage();
		}		
	}
  /*
  *function fetchallpermission
  */
	public function fetchallpermis(){
	  	try {
	  		$fetch=$this->dbpdo->prepare("SELECT * FROM permission");
			$fetch->execute();
			return $fetch->fetchAll();
	 	 } catch (Exception $e) {
	  	    return $e->getMessage();
	 }
  }
/*
*function fetch one permission
*/
  public function fetchonepermis(){
    try {
    	$fetchone=$this->dbpdo->prepare("SELECT *  FROM pemission WHERE idpermis=?");
    	$fetchone->execute([$this->id]);
    	return $fetchone->fetchAllc();   	
     } catch (Exception $e) {
     	return $e->getMessage();   	
    }
  }
  /*
  *function update permission
  */
  public function updatepermis(){
   	try {
  		$update=$this->dbpdo->prepare("UPDATE permission SET designation=? WHERE  idpermis=?");
  		$update->execute([$this->designation,$this->idpermis]);
  		
    } catch (Exception $e) {
    return $e.getMessage(); 		
    }
  }
  /*
  *function delete permission 
  */
  public function deletepermis(){
    try {
     $delete=$this->dbpdo->prepare("DELETE FROM permission WHERE $idpermis=?");
     $delete->execute([$this->idpermis]);	
    } catch (Exception $e) {
    	
    }
  }

}
  ?>
 