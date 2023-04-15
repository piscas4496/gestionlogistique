 <?php 
    class Connexiondb {
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
}
  ?>