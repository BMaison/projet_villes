<?php
session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
		<?php
			function enregistrer ($mail,$nom, $prenom,$mdp)
			{
				try{
					$bdd = new PDO('mysql:host=localhost:3306;dbname=projet;charset=utf8','root', '');
					//lancement de la requete
					$sql="INSERT INTO administrateur(mail_admin, nom, prenom, mdp) VALUES ( '".$mail."','".$nom."','" .$prenom."','".$mdp."' )";
					$rep = $bdd->query($sql);
					echo $sql;
					//$reponse = $bdd->query($sql);
				}
				catch(Exception $e)
				{
					die ('Erreur :' .$e->getMessage());
				}

			}

			if($_GET['n']=="" || $_GET['p']=="" || $_GET['mail']=="" || $_GET['mdp1']=="" || $_GET['mdp2']=="" || $_GET['mdp1']!=$_GET['mdp2'])
				{
				echo'<meta http-equiv="refresh" content="0; url=adminnew.php?n='.$_GET['n'].'&p='.$_GET['p'].'&mail='.$_GET['mail'].'">';
				//si ok meta vers index si non nouveau ,  meta passer les parametre de lurl pour pas tout retzpper 
			}
			else{
				enregistrer($_GET['n'],$_GET['p'],$_GET['mail'],$_GET['mdp1'] );
				echo'<meta http-equiv="refresh" content="0; url=administrateur.php">';
			}
		?>
	</head>

	<body>
	</body>
</html>