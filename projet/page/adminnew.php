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
	<li><a href="nouveau.php">Nouveau client  </a></li>
  </ul>
  </div>


<form method="get" action="enregistrement_admin.php" autocomplete="off">
<p>
 Nom :
 <input type="text" name="n" value="<?php if(isset($_GET['n'])){echo $_GET['n'];}else{echo "";}?>"/>
</p>
<p>
 Prénom :
 <input type="text" name="p" value="<?php if(isset($_GET['p'])){echo $_GET['p'];}else{echo "";}?>"/>
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
<p>
 <input type="submit" value="Envoyer">
</p> 
</form> 

</div>


<div id="footer">
<A HREF="#" ONCLICK="ouverture()">Contact</A>
<a href="mentions_legales.html">Mentions légales</a>
<a href="administrateur.php">Administrateur</a>
</div>

</body>

</html>


