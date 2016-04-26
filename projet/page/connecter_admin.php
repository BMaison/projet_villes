<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<?php

if( $_GET['mail_admin']== "" or $_GET['mdp']== ""){	
	echo'<meta http-equiv="refresh" content="0; url=administrateur.php?absence=">';
}
else{
	try{
		$bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet;charset=utf8','root', '');
		$query = "select * from administrateur where mail_admin='".$_GET ['mail_admin']."' && mdp='".$_GET['mdp']."'";
		$rep = $bdd->query($query);		
		$ligne = $rep ->fetch();
		//echo $ligne['mail_admin'];
		if ($ligne['mail_admin'] != ""){
			print_r(array($ligne['mail_admin'],
				$ligne['nom'],
				$ligne['prenom']));
			$_SESSION['administrateur']=array($ligne['mail_admin'],
				$ligne['nom'],
				$ligne['prenom']);
				print_r($_SESSION);
		}
		else{
			header('Location: administrateur.php?erreur=');
		}
		$rep->closeCursor();
	}
	catch(Exception $e){
		die ('Erreur :' .$e->getMessage());
	}
	echo'<meta http-equiv="refresh" content="0; url=../index.php">';
}
?>
</head>
<body>
</body>
</html>