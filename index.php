<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=utf-8 />
		<title>TEST PHP/HTML/CSS/JAVASCRIPT</title>
	</head>
	
	<body>
		<h1>Liste des fichiers/pages du dossier TEST</h1>
		<ul>
			<?php
			if($dossier = opendir('./'))
			{
			?><?php
			while(false !== ($fichier = readdir($dossier)))
			{
			
			if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'triangle2.php' && $fichier != 'post_upload.php')
			{
			
			$nb_fichier++; // On incrémente le compteur de 1
			echo '<li><a href=".//' . $fichier . '">' . $fichier . '</a></li>';
			} // On ferme le if (qui permet de ne pas afficher index.php, etc.)
			 
			} // On termine la boucle
			
			echo '</ul><br />';
			echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';
			 
			closedir($dossier);
			 
			}
			 
			else
			     echo 'Le dossier n\' a pas pu être ouvert';
			?>


		</ul>
	</body>
</html>