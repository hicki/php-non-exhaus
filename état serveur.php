<?php
function check_serv()
{
try 
{
	$check = fopen("https://www.the-scientist.fr/", "r"); // port de votre serveur : remplacer XXXX par le port //	
} catch (Exception $e) {
	die('Erreur : '.$e->getMessage());
}

if (!$check)
{
?><strong><?php
echo "Mon Serveur : "; ?></strong><font color="red"><?php
echo "OFF"; // Off s'affichera en rouge si le serveur est éteint//
}
else
{
?><strong><?php
echo "Mon Serveur : "; ?></strong><font color="green"><?php
echo "ON"; ?></font><?php // On s'affichera en vert si le serveur est allumé//
$gs_online = TRUE;
}
@fclose($$check);
}
check_serv();
?>