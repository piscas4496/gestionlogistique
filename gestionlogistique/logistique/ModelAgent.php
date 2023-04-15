<?php 

  class Agent {
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

    public function insertagent(){
         if (isset()) {
         	if (!empty()) {
            $Nom=htmlspecialchars(strtoupper($_POST['nom']));
            $Postnom =htmlspecialchars(strtoupper($_POST['postnom']));
            $Prenom =htmlspecialchars(strtoupper($_POST['prenom']));
            $Genre=htmlspecialchars(strtoupper($_POST['genre']));
            $Datenaiss=$_POST['datenaiss'];
            $Telephone=$_POST['telephone'];
            $Email=htmlspecialchars($_POST['email']);
            $Photos=$_POST['Photos'];
            $password=sha1($_POST['password']);

         		$insert=$this->db->prepare(
         			"INSERT INTO personnel (nom,postnom,prenom,genre,datenaiss,telephone,email,photos,password) VALUES (?,?,?,?,?,?,?,?)");
            $insert=execute([$Nom,$Postnom,$Prenom,$Genre,$Datenaiss,$Telephone,$Email,$Photos,$Password])
               
         	}
         }


  }
  public function fetchagents(){
    if (isset(var)) {
      if (!empty(var)) {
         $fetch=$this->db->prepare("SELECT * FROM agent ");
      }
    }

  }
  public function  editagent(){
    if (isset(var)) {
      if (!empty(var)) {
         $Edit=$this->db->prepare("SELECT * FROM agent WHERE idagent=? ");
      }
    }
    
  }
  public function updatagennt(){
    if (isset(var)) {
      if (!empty(var)) {
         $update=$this->db->prepare("UPDATE agent SET '' ");
      }
    }

  }
  public function deleteagent(){
    if (isset(var)) {
      if (!empty(var)) {
         $update=$this->db->prepare("UPDATE agent SET '' ");
      }
    }

  }
 

}

 ?>