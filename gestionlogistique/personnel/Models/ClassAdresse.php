<?php 
    class Adersse {
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

	private $refad;
	private $pays;
  private $province;
  private $ville;
  private $commune
  private $quartier;
  private $avenue;
  private $numero;
  

 	/*seting of all variable*/
	public function setidad($idad){  $this->idad=$idad;}
	public function setpays($pays){ $this->pays=$pays;}
  public function setprovince($province){ $this->province=$province;}
  public function setville($ville){ $this->ville=$ville;}
  public function setcommune($commune){ $this->commune=$commune;}
  public function setquartier($quartier){ $this->quartier=$quartier;}
  public function setavenue($avenue){ $this->avenue=$avenue;}
  public function setnumero($numero){ $this->numero=$numero;}
  


	/* get of all variable of class*/

	public function getidad($idad){ return $this->idad;}
  public function getpays($pays){ return $this->pays;}
  public function getprovince($province){ return $this->province;}
  public function getville($ville){ return $this->ville;}
  public function getcommune($commune){ return $this->commune;}
  public function getquartier($quartier){ return $this->quartier;}
  public function getavenue($avenue){return $this->avenue;}
  public function getnumero($numero){  return $this->numero;}
	/*
  *building of contruct function
  */	
  	public function __construct($idad=0,$pays="",$province="",$ville="",$commune="",$quartier="",$avenue="",$numero=0)
	{
     try
      {	
      	//contruct of pdo
     	$this->dbpdo=new PDO($this->serverpdo,$this->usernamepdo,$this->passwordpdo);
     	//construct of mysqli
     	$this->conndb=new mysqli($this->server,$this->username,$this->password,$this->dbname);

         //consturct of variables for our class
     	$this->idad=$idad;
     	$this->pays=$pays;
      $this->province=$province;
      $this->ville=$ville;
      $this->commune=$commune;
      $this->quartier=$quartier;    
      $this->avenue=$avenue;
      $this->numero=$numero;
     	
      } catch (Exception $e)
      {
     	echo 'echec de chargement'.$e->getmessage();
      }
	}

	/*
	start of function for our processing class
	 *function login adresse
	*/

	public function insertadress(){
		//this insert we will use pdo has database
		try {
			$insert=$this->dbpdo->prepare("INSERT INTO adresse(pays,province,ville,commune,quartier,avenue,numero) VALUES (?,?,?,?,?,?,?)");
			return $insert->execute([$this->pays,$this->province,$this->ville,$this->commune,$this->quartier,$this->avenue,$this->numero]);
			echo "<script>alert("Insertion avec succes");<script>";		
			} catch (Exception $e) {
			 return $e->getmessage();
		}		
	}
  /*
  *function fetchall adersse
  */
	public function fetchalladress(){
	  	try {
	  		$fetch=$this->dbpdo->prepare("SELECT * FROM adresse");
			$fetch->execute();
			return $fetch->fetchAll();
	 	 } catch (Exception $e) {
	  	    return $e->getMessage();
	 }
  }
/*
*function fetch one adresse
*/
  public function fetchoneadress(){
    try {
    	$fetchone=$this->dbpdo->prepare("SELECT *  FROM adresse WHERE idad=?");
    	$fetchone->execute([$this->idad]);
    	return $fetchone->fetchAllc();   	
     } catch (Exception $e) {
     	return $e->getMessage();   	
    }
  }
  /*
  *function update adresse
  */
  public function updateadress(){
   	try {
  	 $update=$this->dbpdo->prepare("UPDATE adresse SET pays=?,province=?,ville=?,commune=?,quartier=?,avenue=?,numero=?");
  	 $update->execute([$this->pays,$this->province,$this->ville,$this->commune,$this->quartier,$this->avenue,$this->numero]);
  		
    } catch (Exception $e) {
    return $e.getMessage(); 		
    }
  }
  /*
  *function delete adresse
  */
  public function deletadress(){
    try {
     $delete=$this->dbpdo->prepare("DELETE FROM adresse WHERE idad=?");
     $delete->execute([$this->idad]);	
    } catch (Exception $e) {
    	return $e.getMessage();
    }
  }

}
  ?>
 