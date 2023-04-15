<?php 
    class Fonction {
	/*
  *connexion with mysqli 
  *
  */
	private $server='localhost';
	private $dbname='gestionlogistique';
	private $username='root';
	private $password;
	private $dbmysqly;

	/*
	*connexion with pdo
	*
	*/
	private $serverpdo="mysql:host=localhost;dbname=gestionlogistique";
	private $usernamepdo='root';
	private $passwordpdo;
	private $dbpdo;

	//===============end of daclaration of databse=========================
	//===============start declaration of element class====================

	private $idfonction;
	private $designation;
 	/*seting of all variable*/
	public function setidfonction($idrole){ $this->idfonction=$idfonction; }
	public function setdesignation($designation){ $this->designation=$designation}

	/* get of all variable of class*/

	public function getidfonction(){ return $this->idfonction; }
	public function getdesignation(){ return $this->designation; }
	
	/*building of contruct function*/	
  	public function __construct($idfonction=0,$designation="")
	{
     try
      {	
      	//contruct of pdo
     	$this->dbpdo=new PDO($this->serverpdo,$this->usernamepdo,$this->passwordpdo);
     	//construct of mysqli
     	$this->conndb=new mysqli($this->server,$this->username,$this->password,$this->dbname);

         //consturct of variables for our class
     	$this->idfonction=$idfonction;
     	$this->designation=$designation;
     	
      } catch (Exception $e)
      {
     	$info='echec de chargement'.$e->getmessage();
      }
	}

	/*
	start of function for our processing class
	 *function insert fonction
	*/
	public function insertfonction(){
		//this insert we will use pdo has database
		try {
			$insert=$this->dbpdo->prepare("INSERT INTO fonction(designation) VALUES (?)");
			return $insert->execute([$this->designation]);
			echo "<script>alert("Insertion avec succes");<script>";		
			} catch (Exception $e) {
			 return $e->getmessage();
		}		
	}
  /*
  *function fetchall fonction
  */
	public function fetchallfonction(){
	  	try {
	  		$fetch=$this->dbpdo->prepare("SELECT * FROM fonction");
			$fetch->execute();
			return $fetch->fetchAll();
	 	 } catch (Exception $e) {
	  	    return $e->getMessage();
	 }
  }
/*
*function fetch one fonction
*/
  public function fetchonefonction(){
    try {
    	$fetchone=$this->dbpdo->prepare("SELECT *  FROM fonction WHERE idfonction=?");
    	$fetchone->execute([$this->idfonction]);
    	return $fetchone->fetchAllc();   	
     } catch (Exception $e) {
     	return $e->getMessage();   	
    }
  }
  /*
  *function update fonction
  */
  public function updatefonction(){
   	try {
  		$update=$this->dbpdo->prepare("UPDATE role SET designation=? WHERE  idrole=?");
  		$update->execute([$this->designation,$this->idfonction]);
  		
    } catch (Exception $e) {
    return $e.getMessage(); 		
    }
  }
  /*
  *function delete fonction 
  */
  public function deletefonction(){
    try {
        $delete=$this->dbpdo->prepare("DELETE FROM fontcion WHERE idfonction=?");
        $delete->execute([$this->idfonction]);	
    } catch (Exception $e) {
      return $e.getMessage();   	
   }
  }
}
  ?>
 ?>