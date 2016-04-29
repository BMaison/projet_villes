<!DOCTYPE html>

<html>

	<head>
		<title>Ville idéale</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<link  rel="stylesheet"  href="../styles/style.css"  type="text/css"  media="screen"/>  
	</head>

	<body>
		<form id="contact" method="get" action="traitement_formulaire.php">
			Vos coordonnées :
				<p>
				<label for="nom">Nom</label>
				<input type="text" id="nom" name="nom" tabindex="1" />
				</p>
				<p>
				<label for="email">Email</label>
				<input type="text" id="email" name="email" tabindex="2" />
				</p>
		 
			Votre message :
				<p>
				<label for="objet">Objet</label>
				<input type="text" id="objet" name="objet" tabindex="3" />
				</p>
				<p>
				<label for="message">Message</label>
				<textarea id="message" name="message" tabindex="4" cols="30" rows="8">Tapez ici votre message</textarea>
				</p>
		 
			<input type="submit" name="envoi" value="Envoyer" />
		</form>

	</body>

</html>