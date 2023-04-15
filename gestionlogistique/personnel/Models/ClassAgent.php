<?php 
    class Agents {
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
	private $usernamepdo='root';
	private $passwordpdo;
	private $db;

	//===============end of daclaration of databse=========================
	//===============start declaration of element class====================

	private $refagent;
	private $nom;
  private $postnom;
  private $genre;
  private $datenaiss
  private $prenom;
  private $telephone;
  private $email;
  private $photos;
  private $passwordag;

 	/*seting of all variable*/
	public function setrefagent($refagent){  $this->refagent=$refagent;}
	public function setnom($nom){ $this->nom=$nom;}
  public function setpostnom($postnom){ $this->postnom=$postnom;}
  public function setprenom($prenom){ $this->prenom=$prenom;}
  public function setgenre($genre){ $this->genre=$genre;}
  public function setdatenaiss($datanaiss){ $this->datenaiss=$datanaise;}
  public function settelephonen($telephone){ $this->telephone=$telephone;}
  public function setemail($email){ $this->email=$email;}
  public function setphotos($photos){ $this->photos=$photos;}
  public function setpassword($passwordag){$this->passwordag=$passwordag;}


	/* get of all variable of class*/

	public function getrefagent($refagent){ return $this->refagent;}
  public function getnom($nom){ return $this->nom;}
  public function getpostnom($postnom){ return $this->postnom;}
  public function getprenom($prenom){ return $this->prenom;}
  public function getgenre($genre){ return $this->genre;}
  public function getdatenaiss($datenaiss){ return $this->datenaiss;}
  public function gettelephonene($telephone){return $this->telephone;}
  public function getemail($email){  return $this->email;}
  public function getphotos($photos){ return $this->photos; }
  public function getpasswordag($passwordag){ return $this->passwordag; }
	
	/*
  *building of contruct function
  */	
  	public function __construct($refagent=0,$nom="",$postnom="",$prenom="",$genre="",$datenaiss="",$telephone="",$email="",$photos="",$passwordag="")
	{
     try
      {	
      	//contruct of pdo
     	$this->dbpdo=new PDO($this->serverpdo,$this->usernamepdo,$this->passwordpdo);
     	//construct of mysqli
     	$this->conndb=new mysqli($this->server,$this->username,$this->password,$this->dbname);

         //consturct of variables for our class
     	$this->refagent=$refagent;
     	$this->nom=$nom;
      $this->postnom=$postnom;
      $this->prenom=$prenom;
      $this->genre=$genre;
      $this->datenaiss=$datenaiss;
      $this->telephone=$telephone;
      $this->email=$email;
      $this->photos=$photos;
      $this->password=$password;
     	
      } catch (Exception $e)
      {
     	echo 'echec de chargement'.$e->getmessage();
      }
	}

	/*
	start of function for our processing class
	 *function login agent
	*/

  public function loginagent(){

  }
	public function insertagent(){
		//this insert we will use pdo has database
		try {
			$insert=$this->dbpdo->prepare("INSERT INTO agents(nom,postnom,prenom,genre,datenaiss,telephone,email,photos,password) VALUES (?,?,?,?,?,?,?,?,?)");
			return $insert->execute([$this->nom,$this->postnom,$this->prenom,$this->genre,$this->datenaiss,$this->telephone,$this->email,$this->photos,$this->password]);
			echo "<script>alert("Insertion avec succes");<script>";		
			} catch (Exception $e) {
			 return $e->getmessage();
		}		
	}
  /*
  *function fetchall agents
  */
	public function fetchallagents(){
	  	try {
	  		$fetch=$this->dbpdo->prepare("SELECT * FROM agents");
			$fetch->execute();
			return $fetch->fetchAll();
	 	 } catch (Exception $e) {
	  	    return $e->getMessage();
	 }
  }
/*
*function fetch one agent
*/
  public function fetchoneagent(){
    try {
    	$fetchone=$this->dbpdo->prepare("SELECT *  FROM agents WHERE refagent=?");
    	$fetchone->execute([$this->iduser]);
    	return $fetchone->fetchAllc();   	
     } catch (Exception $e) {
     	return $e->getMessage();   	
    }
  }
  /*
  *function update agntet
  */
  public function updateagent(){
   	try {
  	 $update=$this->dbpdo->prepare("UPDATE agents SET nom=?,postnom=?,prenom=?,genre=?,datenaiss=?,telephone=?,email=?,photos=?,passwordag=? WHERE $refagent=?");
  	 $update->execute([$this->nom,$this->postnom,$this->prenom,$this->genre,$this->datenaiss,$this->telephone,$this->email,$this->photos,$this->password]);
  		
    } catch (Exception $e) {
    return $e.getMessage(); 		
    }
  }
  /*
  *function delete agent 
  */
  public function deletagent(){
    try {
     $delete=$this->dbpdo->prepare("DELETE FROM agents WHERE refagent=?");
     $delete->execute([$this->refagent]);	
    } catch (Exception $e) {
    	return $e.getMessage();
    }
  }

}
  ?>
 