<?php 
    class Role {
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
	//private $dbnamepdo='demography' ;
	private $usernamepdo='root';
	private $passwordpdo;
	private $dbpdo;

	//===============end of daclaration of databse=========================
	//===============start declaration of element class====================

	private $idrole;
	private $designation;
 	/*seting of all variable*/
	public function setidrole($idrole){ $this->idrole=$idrole; }
	public function setdesignation($designation){ $this->designation=$designation}

	/* get of all variable of class*/

	public function getidrole(){ return $this->idrole; }
	public function getdesignation(){ return $this->designation; }
	
	/*building of contruct function*/	
  	public function __construct($idrole=0,$designation="")
	{
     try
      {	
      	//contruct of pdo
     	$this->dbpdo=new PDO($this->serverpdo,$this->usernamepdo,$this->passwordpdo);
     	//construct of mysqli
     	$this->conndb=new mysqli($this->server,$this->username,$this->password,$this->dbname);

         //consturct of variables for our class
     	$this->idrole=$idrole;
     	$this->designation=$designation;
     	
      } catch (Exception $e)
      {
     	$info='echec de chargement'.$e->getmessage();
      }
	}

	/*
	start of function for our processing class
	 *function insert role
	*/
	public function insertrole(){
		//this insert we will use pdo has database
		try {
			$insert=$this->dbpdo->prepare("INSERT INTO role(designation) VALUES (?)");
			return $insert->execute([$this->designation]);
			echo "<script>alert("Insertion avec succes");<script>";		
			} catch (Exception $e) {
			 return $e->getmessage();
		}		
	}
  /*
  *function fetchallrole
  */
	public function fetchallrole(){
	  	try {
	  		$fetch=$this->dbpdo->prepare("SELECT * FROM role");
			$fetch->execute();
			return $fetch->fetchAll();
	 	 } catch (Exception $e) {
	  	    return $e->getMessage();
	 }
  }
/*
*function fetch one role
*/
  public function fetchonerole(){
    try {
    	$fetchone=$this->dbpdo->prepare("SELECT *  FROM role WHERE idrole=?");
    	$fetchone->execute([$this->idrole]);
    	return $fetchone->fetchAllc();   	
     } catch (Exception $e) {
     	return $e->getMessage();   	
    }
  }
  /*
  *function update role
  */
  public function updaterole(){
   	try {
  		$update=$this->dbpdo->prepare("UPDATE role SET designation=? WHERE  idrole=?");
  		$update->execute([$this->designation,$this->idrole]);
  		
    } catch (Exception $e) {
    return $e.getMessage(); 		
    }
  }
  /*
  *function delete role 
  */
  public function deleterole(){
    try {
        $delete=$this->dbpdo->prepare("DELETE FROM role WHERE idrole=?");
        $delete->execute([$this->idrole]);	
    } catch (Exception $e) {
      return $e.getMessage();   	
   }
  }
}
  ?>
 ?>