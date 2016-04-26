<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
<title>Ville idéale</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<link  rel="stylesheet"  href="../styles/style.css"  type="text/css"  media="screen"/>  
<SCRIPT LANGUAGE="JavaScript">
function ouverture()
{
window.open("contact.php", "ouverture", "toolbar=no, status=yes, scrollbars=yes, resizable=no, width=450, height=380");
}
</SCRIPT>
</head>

<body>
<div id="corps">

<img id="logo" src="../images/ville.jpg" alt= "Logo" /> 

<div id="menu">
  <ul id="onglets">
    <li><a href="../index.php"> Accueil </a></li>
    <li><a href="../onglet/villes.php"> Villes </a></li>
	<li><a href="../nouveau.php">Nouveau client  </a></li>
  </ul>
  </div>

<?php 
if(isset($_SESSION['administrateur'])==FALSE){
	if(isset($_GET['erreur'])){echo'Votre email ou votre mot de passe sont erronés.';}
	if(isset($_GET['absence'])){echo'Veuillez saisir votre email et votre mot de passe.';}
	?>
  
	<form method="get" action="connecter_admin.php" autocomplete="off">
	<p>
	Adresse e-mail:
	<input type="text" name="mail_admin" value=""/>
	</p>
	<p>
	Mot de passe :
	<input type="password" name="mdp" value=""/>
	</p>
	<p>
	<input type="submit" value="Se connecter">
	</p> 
	</form> 
	<?php
	}
	
	else{
		echo'<a href="adminville.php">Ajouter une ville</a><br>';
		echo'<a href="adminservice.php">Ajouter un service</a><br>';
		echo'<a href="adminnew.php">Ajouter un nouvel administrateur</a>';
	}
?>

</div>
<div id="footer">
<A HREF="#" ONCLICK="ouverture()">Contact</A>
<a href="mentions_legales.html">Mentions légales</a>
<a href="administrateur.php">Administrateur</a>
</div>

</body>

</html>


