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
window.open("../page/contact.php", "ouverture", "toolbar=no, status=yes, scrollbars=yes, resizable=no, width=450, height=380");
}
</SCRIPT>
</head>

<body>
<div id="corps">

<img id="logo" src="../images/ville.jpg" alt= "Logo" /> 

<div id="menu">
  <ul id="onglets">
    <li><a href="../index.php"> Accueil </a></li>
    <li class="active"><a href="../onglet/villes.php"> Villes </a></li>
    <li ><a href="../onglet/services.php"> Services </a></li>
	<li><a href="../nouveau.php">Nouveau client  </a></li>
  </ul>
</div>

<br>
Répartition des services par ville :
<br><br>

<?php
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet;charset=utf8','root', ''); 
$rep = $bdd->query('select * from ville'); 

$tableau = array();

foreach($_GET as $v){
	array_push($tableau,$v);	
}


/* requete pour id, ville et services automatiser tableau
tableau pour les services ? 
Association : https://github.com/VTwo-Group/Apriori-Algorithm/blob/master/README.md
tranche d'age  */


$i=0;
echo'<form method="get" action="" autocomplete="on">';
while($ligne = $rep ->fetch()){ 
	if(in_array($ligne["nom"], $tableau)) {
		echo'<input type="checkbox" name="v'.$i.'" onChange="submit()" checked value="'.$ligne["nom"].'" />';
		echo "".$ligne["nom"]."<br>";
		$q='SELECT type, count(distinct (nom)) from service where ville="'.$ligne["nom"].'" group by type';
		$rep1=$bdd->query($q);
		while($ligne1 = $rep1 ->fetch()){ 
			echo "".$ligne1["type"]."";
			echo' : ';
			echo"".$ligne1["count(distinct (nom))"]."<br>"; 	
			}			
		}
		else{
			echo'<input type="checkbox" name="v'.$i.'" onChange="submit()" value="'.$ligne["nom"].'" />';
			echo "".$ligne["nom"]."<br>";
		}
	
	$i = $i+1;
}
echo'</form>';
?>









</div>


<div id="footer">
<A HREF="#" ONCLICK="ouverture()">Contact</A>
<a href="../page/mentions_legales.html">Mentions légales</a>
<a href="../page/administrateur.php">Administrateur</a>
</div>

</body>

</html>