<!DOCTYPE html>

<html>

	<head>
		<title>Ville idéale</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<link  rel="stylesheet"  href="styles/style.css"  type="text/css"  media="screen"/>  
		<SCRIPT LANGUAGE="JavaScript">
			function ouverture(){
				window.open("page/contact.php", "ouverture", "toolbar=no, status=yes, scrollbars=yes, resizable=no, width=450, height=380");
			}

			function affiche(e){
				var	elt = document.getElementById(e);
				elt.style = "display:block";
			}
		</SCRIPT>
	</head>

	<body>
		<div id="corps">

			<img id="logo" src="images/ville.jpg" alt= "Logo" /> 


			<div id="menu">
			  <ul id="onglets">
				<li><a href="index.php"> Accueil </a></li>
				<li><a href="onglet/villes.php"> Villes </a></li>
				<li class="active"><a href="nouveau.php">Nouveau client  </a></li>
			  </ul>
			</div>

			<?php
				/* try
				{
				$bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet;charset=utf8','root', ''); 
				}
				catch (Exception $e)
				{
				die ('Erreur : problème de connexion avec la base de données.' . $e->getMessage(''));
				}
				$reponse = $bdd->query('SELECT nom FROM ville');
				while($donnees=$reponse->fetch())
				{
				echo $donnees['nom'] . '<br />';
				}
				$reponse->closeCursor(); */
			?>

			<form method="get" action="enregistrement_client.php" autocomplete="off">

			<p> Sexe : 
			Homme
			<INPUT type="radio" name="genre" value="H">
			Femme
			<INPUT type="radio" name="genre" value="F">
			</p>
			<p>
			 Nom :
			 <input type="text" name="n" value="<?php if(isset($_GET['n'])){echo $_GET['n'];}else{echo "";}?>"/>
			</p>
			<p>
			 Prénom :
			 <input type="text" name="p" value="<?php if(isset($_GET['p'])){echo $_GET['p'];}else{echo "";}?>"/>
			</p>
			<p>
			Adresse :
			 <input type="text" name="adr" value="<?php if(isset($_GET['adr'])){echo $_GET['adr'];}else{echo "";}?>"/>
			</p>
			<p>
			Numéro de téléphone:
			 <input type="text" name="num" value="<?php if(isset($_GET['num'])){echo $_GET['num'];}else{echo "";}?>"/>
			</p>
			<p>
			Adresse e-mail:
			 <input type="text" name="mail" value="<?php if(isset($_GET['mail'])){echo $_GET['mail'];}else{echo "";}?>"/>
			</p>
			<p>
			Mot de passe :
			 <input type="password" name="mdp1" value=""/>
			</p>
			<p>
			Confirmer votre mot de passe :
			<input type="password" name="mdp2" value=""/>
			</p>

			<p>Informations complémentaires</p>

			<p>
			Age :
			<input type="number" name="age" value="<?php if(isset($_GET['age'])){echo $_GET['age'];}else{echo "";}?>"/>
			</p>

			<p>Situation maritale :
			Célibataire
			<INPUT type="radio" name="maritale" value="C">
			En couple
			<INPUT type="radio" name="maritale" value="EC">
			</p>


			<p>
			Avez-vous des enfants ?
			Oui
			<INPUT type="radio" name="enfants" value="O" onclick="affiche('div1')">
			Non
			<INPUT type="radio" name="enfants" value="N">
			</p>

			<div id="div1" onclick="affiche('div1')">
			<INPUT type="number" name="nbenf" value="nbenf">
			</div>

			<p>
			Etablissement scolaire :
			<SELECT name="scolaire">
			<OPTION VALUE="nonsco">Non scolarisé</OPTION>
			<OPTION VALUE="creche">Crèche / Garderie</OPTION>
			<OPTION VALUE="maternelle">Maternelle</OPTION>
			<OPTION VALUE="primaire">Primaire</OPTION>
			<OPTION VALUE="college">Collège</OPTION>
			<OPTION VALUE="lycee">Lycée</OPTION>
			<OPTION VALUE="etudes">Etudes supérieures</OPTION>
			<OPTION VALUE="autre">Autre</OPTION>
			</SELECT> 
			</p>


			<p>
			<input type="submit" value="Envoyer">
			</p> 
			</form> 

		</div>


		<div id="footer">
			<A HREF="#" ONCLICK="ouverture()">Contact</A>
			<a href="page/mentions_legales.html">Mentions légales</a>
			<a href="page/administrateur.php">Administrateur</a>
		</div>

	</body>

</html>