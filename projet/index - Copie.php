﻿<?php
session_start();
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>
<title>Ville idéale</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<link  rel="stylesheet"  href="styles/style.css"  type="text/css"  media="screen"/>
<SCRIPT LANGUAGE="JavaScript">
function ouverture()
{
window.open("page/contact.php", "ouverture", "toolbar=no, status=yes, scrollbars=yes, resizable=no, width=450, height=380");
}
</SCRIPT>
<?php
try
{
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet;charset=utf8','root', ''); 
}
catch (Exception $e)
{
die ('Erreur : problème de connexion avec la base de données.' . $e->getMessage(''));
}
$reponse = $bdd->query('SELECT nom, latitude,longitude FROM ville');
/*while($donnees=$reponse->fetch())
{
echo $donnees['latitude'] . '<br />';
}*/
?>
<!-- Elément Google Maps indiquant que la carte doit être affiché en plein écran et
qu'elle ne peut pas être redimensionnée par l'utilisateur -->
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<!-- Inclusion de l'API Google MAPS -->
<!-- Le paramètre "sensor" indique si cette application utilise détecteur pour déterminer la position de l'utilisateur -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialiser() {
	var latlng = new google.maps.LatLng(46.227638, 2.213749);

	var options = {
		center: latlng,
		zoom: 5,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	var carte = new google.maps.Map(document.getElementById("carte"), options);

	//création du marqueur
	
	var marqueurs = new Object();
	
	
	
<?php
$i = 0;
while($donnees=$reponse->fetch())
{
	echo '
		var marqueur = new google.maps.Marker({
		position: new google.maps.LatLng('.$donnees["latitude"].', '.$donnees["longitude"].'),
		map: carte
	});
	marqueurs['.$i.']="'.$donnees["nom"].'";
	google.maps.event.addListener(marqueur, "click", function() {
		alert(marqueurs['.$i.']);
		var	elt = document.getElementById("1");	
		elt.style = "display:block";	
	});
	';
	$i++;

}

$reponse->closeCursor();
?>
}
</script>
</head>

<body onload="initialiser()">
<div id="corps">

<img id="logo" src="images/ville.jpg" alt= "Logo" /> 


<div id="menu">
  <ul id="onglets">
    <li class="active"><a href="index.php"> Accueil </a></li>
    <li><a href="onglet/villes.php"> Villes </a></li>
    <li><a href="onglet/services.php"> Services </a></li>
	<li><a href="nouveau.php">Nouveau client  </a></li>
  </ul>
</div>

<?php
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet;charset=utf8','root', '');
$rep = $bdd->query('select * from administrateur');

if(isset($_SESSION['administrateur'])==FALSE){
	}
	else{
		echo "Bonjour ";
		echo $_SESSION["administrateur"][2];
		echo " ";
		echo $_SESSION["administrateur"][1];
		echo '<br><a href="page/deconnexion_admin.php">Se déconnecter</a>';
}
?>



<div id="carte" style="width:50%; height:50%"></div>

<-- requete pour id, ville et services automatiser tableau
tableau pour les services ? 
Association : https://github.com/VTwo-Group/Apriori-Algorithm/blob/master/README.md
tranche d'age -->

<table><tr class="ligne" id="1"><td>Paris</td></tr></table>



</div>


<div id="footer">
<A HREF="#" ONCLICK="ouverture()">Contact</A>
<a href="page/mentions_legales.html">Mentions légales</a>
<a href="page/administrateur.php">Administrateur</a>
</div>



</body>

</html>