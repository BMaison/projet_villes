<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
<?php
if($_GET['genre']!="" || $_GET['n']!="" || $_GET['p']!="" || $_GET['adr']!="" || $_GET['num']!="" || $_GET['mail']!="" || $_GET['mdp1']!="" || $_GET['mdp2']!="" || $_GET['mdp1']==$_GET['mdp2']$_GET['age']!="" || $_GET['maritale']!="" || $_GET['enfants']!="" || $_GET['scolaire']!="" || )
	{
		print "pas bien rempli";
		echo "<meta http-equiv='refresh'; URL=nouveau.php;charset=UTF-8'>";
//si ok meta vers index si non nouveau ,  meta passer les parametre de lurl pour pas tout retzpper 
}
else{
}
?>
 <title>enregistrement</title>
</head>
<body>
 <?php
 echo $_GET['n'];
 echo '<BR>';
 echo $_GET['p'];
 echo '<BR>';
 echo $_GET['adr'];
 echo '<BR>';
 echo $_GET['num'];
 echo '<BR>';
 echo $_GET['mail']; 
 echo '<BR>';
 echo $_GET['mdp1'];
 echo '<BR>';
 echo $_GET['mdp2'];
 
 ?>
</body>
</html>