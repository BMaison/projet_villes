<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ville idéale</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<link  rel="stylesheet"  href="../styles/style.css"  type="text/css"  media="screen"/>
		<script type="text/javascript" src="jquery-2.2.3.min.js"></script>

		<SCRIPT LANGUAGE="JavaScript">
			<?php
				try{
					$bdd = new PDO('mysql:host=localhost;port=3306;dbname=projet;charset=utf8','root', ''); 
				}
				catch (Exception $e){
					die ('Erreur : problème de connexion avec la base de données.' . $e->getMessage(''));
				}
				$reponse = $bdd->query('SELECT id_ville, nom, latitude,longitude FROM ville');
			?>

			function ouverture(){
				window.open("../page/contact.php", "ouverture", "toolbar=no, status=yes, scrollbars=yes, resizable=no, width=450, height=380");
			}

			$(document).ready(function() {
				$("button").click(function(){	
					alert("Jaime");
				});
			});

			/* $(document).ready(function() {
				$("input").click(function(){	
					<?php
					while($donnees=$reponse->fetch()){
							echo '
							var	elt = document.getElementById("'.$donnees["id_ville"].'");	
							// elt.style = "display:block; border:1px solid #41AFC3";
							document.getElementById("tableau").value = elt;
							alert(document.getElementById("tableau").value);
							';
						}
					$reponse->closeCursor();
					?>
				});
			}); */
		</SCRIPT>
	</head>

	<body>
		<div id="corps">

			<img id="logo" src="../images/ville.jpg" alt= "Logo" /> 

			<div id="menu">
			  <ul id="onglets">
				<li><a href="../index.php"> Accueil </a></li>
				<li class="active"><a href="../onglet/villes.php"> Villes </a></li>
				<li><a href="../nouveau.php">Nouveau client  </a></li>
			  </ul>
			</div>

			<p>
			Répartition des services par ville :
			</p>

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
				tranche d'age  

				$_GET['v'.$i.'']
				*/
				  
				$i=0;
				echo'<form method="get" action="" autocomplete="on">';
				while($ligne = $rep ->fetch()){ 
					if(in_array($ligne["nom"], $tableau)) {
						echo'<input id="v'.$i.'" type="checkbox" name="v'.$i.'" onChange="submit()" checked value="'.$ligne["nom"].'" onclick="cocher()"/>';
						echo "".$ligne["nom"]." ";
						echo"<button><img id='coeur' src='../images/coeur.png' alt= 'Jaime' /></button>";
						echo"<br>";
						$q='SELECT type, count(distinct (nom)) from service where ville="'.$ligne["nom"].'" group by type';
						$rep1=$bdd->query($q);
						while($ligne1 = $rep1 ->fetch()){ 
							echo "".$ligne1["type"]."";
							echo' : ';
							echo"".$ligne1["count(distinct (nom))"]."<br>";
			?>

			<script>
				function cocher(){
					<?php
						echo'
						a="'.$ligne["nom"].'";
						b="'.$ligne1["type"].'";
						c="'.$ligne1["count(distinct (nom))"].'";
						';
					?>
						alert(a+" "+b+" "+c);
						document.getElementById("tableau").innerHTML = a+" "+b+" "+c;
				}

					/* $("input").click(function(){	
						<?php
							echo '
							alert("v'.$i.'");
							';
							echo'
							var	elt = document.getElementById("v'.$i.'");	
							';
							
							echo '
							elt.style = "display:block; border:1px solid #41AFC3"; 
							';
							echo'
							document.getElementById("tableau").value = elt;
							';
							echo'
							document.getElementById(".$ligne1["id_ville"].").value = elt;
							'; 
							echo'
							alert(elt);
							';
						?>
					}); */
				</script>
				<?php
					
					} 
				
					/* if($_GET["v".$i.""]){
						echo $i;
					} */
					
					}
					else{
						echo'<input type="checkbox" name="v'.$i.'" onChange="submit()" value="'.$ligne["nom"].'" />';
						echo "".$ligne["nom"]."<br>";
					}
					
					$i = $i+1;
				}
				echo'</form>';





				$bdd1 = new PDO('mysql:host=localhost;port=3306;dbname=projet;charset=utf8','root', '');
				$rep1 = $bdd1->query('select id_ville, nom from ville');

				while ($ligne1 = $rep1 ->fetch()){
					echo"
					<table>
					<tr class='ligne' id=".$ligne1["id_ville"].">
					<td>".$ligne1["nom"]."</td>";
					
					$q='SELECT type, count(distinct (nom)) from service where ville="'.$ligne1["nom"].'" group by type';
					$rep2=$bdd->query($q);
					while($ligne2 = $rep2 ->fetch()){ 
						echo "
						<td>".$ligne2["type"].":</td>
						<td>".$ligne2["count(distinct (nom))"]."</td>"; 	
					}			
					
					echo"</tr>
					</table>
					";
				}
			?>

			<div id="tableau"></div>

		</div>


		<div id="footer">
			<A HREF="#" ONCLICK="ouverture()">Contact</A>
			<a href="../page/mentions_legales.html">Mentions légales</a>
			<a href="../page/administrateur.php">Administrateur</a>
		</div>

	</body>

</html>