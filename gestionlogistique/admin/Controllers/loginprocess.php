
<?php
 include("../config/connexiondb.php"); 
  if (isset($_POST['connexion'])) { 
  	echo $error="";
  		   $Email= htmlspecialchars(trim($_POST['email']));
           $Password =sha1($_POST['password']);               
 	  		if (isset($Password) AND !empty($Password)) {
 	 	 		if(isset($Email) AND !empty($Email)) {
                  $req=$conndb->prepare("SELECT * FROM admin WHERE  email=? AND password=?");	
 	 	  		   $req->execute(array($Email,$Password));
 	 	  		   $etudexist=$req->rowCount();
           					if ($etudexist ==1) {
           				$affichage = $req->fetch();
           				   $_SESSION['idadmin'] = $affichage['idadmin'];
           					$_SESSION["pseudo"]=$affichage['psedo'];
           					$_SESSION["email"]=$affichage['email'];
           			 		$_SESSION["role"]=$affichage['role'];
           					$_SESSION["photos"]=$affichage['photos'];                          
		header("Location:../index.php?idadmin=".$_SESSION['idadmin']);				 				 
						
 	 	                 }else{
 	 						$error = "mauvais email ou mot de passe";
 	 					     }
 
																	
				}else{
					 $error='vous devez remplir tous les champs svp!';
				     }	
      		
      	}else{
      		$error="certains champs n'existent pas ";
      		}
	}
	
 ?>