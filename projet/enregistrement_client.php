<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
<?php
function enregistrer ($nom, $prenom, $adresse , $numero, $mail ,$mdp)
{
	try{
		$bdd = new PDO('mysql:host=localhost:3306;dbname=projet;charset=utf8','root', '');
		//lancement de la requete
		$sql="INSERT INTO utilisateur(mail, prenom, adresse, numero, mail, mdp) VALUES ( '".$nom."','" .$prenom."',' ".$adresse."','".$numero."', '".$mail."', '".$mdp."' )";
		$rep = $bdd->query($sql);
		echo $sql;
		//$reponse = $bdd->query($sql);
	}
	catch(Exception $e)
	{
		die ('Erreur :' .$e->getMessage());
	}

}


if($_GET['genre']!="" || $_GET['n']!="" || $_GET['p']!="" || $_GET['adr']!="" || $_GET['num']!="" || $_GET['mail']!="" || $_GET['mdp1']!="" || $_GET['mdp2']!="" || $_GET['mdp1']==$_GET['mdp2']$_GET['age']!="" || $_GET['maritale']!="" || $_GET['enfants']!="" || $_GET['scolaire']!="" || )
	{
		print "pas bien rempli";
		echo "<meta http-equiv='refresh'; URL=nouveau.php;charset=UTF-8'>";
//si ok meta vers index si non nouveau ,  meta passer les parametre de lurl pour pas tout retzpper 
}
else{
}
?>
</head>

<body>
</body>
</html>