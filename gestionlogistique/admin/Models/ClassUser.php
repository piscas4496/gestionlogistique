<?php 
    class Users {
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

	private $iduser;
	private $username;
  private $telephone;
  private $email;
  private $avatar;
  private $password;

 	/*seting of all variable*/
	public function setiduser($iduser){  $this->iduser=$iduser;}
	public function setusername($username){ $this->username=$username;}
  public function settelephonen($telephone){ $this->telephone=$telephone;}
  public function setemail($email){ $this->email=$email;}
  public function setavatar($avatar){ $this->avatar=$avatar;}
  public function setpassword($password){$this->password=$avatar;}


	/* get of all variable of class*/

	public function getiduser($iduser){ return $this->iduser;}
  public function getusername($username){ return $this->username;}
  public function gettelephonene($telephone){return $this->telephone;}
  public function getemail($email){  return $this->email;}
  public function getavatar($avatar){ return $this->avatar; }
  public function getpassword($password){ return $this->password; }
	
	/*
  *building of contruct function
  */	
  	public function __construct($iduser=0,$username="",$telephone="",$email="",$avatar="",$password="")
	{
     try
      {	
      	//contruct of pdo
     	$this->dbpdo=new PDO($this->serverpdo,$this->usernamepdo,$this->passwordpdo);
     	//construct of mysqli
     	$this->conndb=new mysqli($this->server,$this->username,$this->password,$this->dbname);

         //consturct of variables for our class
     	$this->iduser=$iduser;
     	$this->username=$username;
      $this->telephone=$telephone;
      $this->email=$email;
      $this->avatar=$avatar;
      $this->password=$password;
     	
      } catch (Exception $e)
      {
     	echo 'echec de chargement'.$e->getmessage();
      }
	}

	/*
	start of function for our processing class
	 *function login user
	*/

  public function loginuser(){

  }
	public function insertuser(){
		//this insert we will use pdo has database
		try {
			$insert=$this->dbpdo->prepare("INSERT INTO users(username,telephone,email,avatar,password) VALUES (?,?,?,?,?)");
			return $insert->execute([$this->username,$this->telephone,$this->email,$this->avatar,$this->password]);
			echo "<script>alert("Insertion avec succes");<script>";		
			} catch (Exception $e) {
			 return $e->getmessage();
		}		
	}
  /*
  *function fetchallusers
  */
	public function fetchallusers(){
	  	try {
	  		$fetch=$this->dbpdo->prepare("SELECT * FROM users");
			$fetch->execute();
			return $fetch->fetchAll();
	 	 } catch (Exception $e) {
	  	    return $e->getMessage();
	 }
  }
/*
*function fetch one user
*/
  public function fetchoneuser(){
    try {
    	$fetchone=$this->dbpdo->prepare("SELECT *  FROM users WHERE iduser=?");
    	$fetchone->execute([$this->iduser]);
    	return $fetchone->fetchAllc();   	
     } catch (Exception $e) {
     	return $e->getMessage();   	
    }
  }
  /*
  *function update user
  */
  public function updateuser(){
   	try {
  	 $update=$this->dbpdo->prepare("UPDATE users SET username=?,telephone=?,email=?,avatar=?,password=? WHERE $idpermis=?");
  	 $update->execute([$this->username,$this->telephone,$this->email,$this->avatar,$this->password]);
  		
    } catch (Exception $e) {
    return $e.getMessage(); 		
    }
  }
  /*
  *function delete user 
  */
  public function deleteuser(){
    try {
     $delete=$this->dbpdo->prepare("DELETE FROM users WHERE iduser=?");
     $delete->execute([$this->iduser]);	
    } catch (Exception $e) {
    	
    }
  }

}
  ?>
 