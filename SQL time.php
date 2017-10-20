<?php
// Connexion à la base de données [Connection to database]
try
{
    $bdd = new PDO('mysql:host=the-scientist.fr.mysql;dbname=the_scientist_f;pass=experimentboy;charset=utf8', 'the_scientist_f', 'experimentboy');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//compteur de temps [time counter]
$msc = microtime(true);
//requete [request]
$data = $bdd->query('SELECT * FROM SQL_time');
//arret du temps [stop the tume]
$msc = microtime(true)-$msc;
//insertion des données [insert data]
$time = $msc;
$query = $bdd->prepare("INSERT INTO SQL_time (time, date) VALUES(:time, :date)");
                $query->bindParam(":time", $time);
                $query->bindParam(":date", $date);
                $query->execute();

//resultat [result]
echo "Le serveur SQL a répondu en ";
echo $msc . ' s, donc en '; // in seconds
echo ($msc * 1000) . ' ms<br/>'; // in millseconds
//affichage des anciens résultat [display of old results]
echo "Voici les résultat précédents :<br/>";

$sql = "SELECT * FROM SQL_time ORDER BY id DESC LIMIT 0,10";
foreach($bdd->query($sql) as $val)
{
	$date = date('d/m/Y', $val['date']);
	echo $val['date'] . " , le serveur SQL a répondu en " . $val['time'] . " s, donc en " . ($val['time'] * 1000) . " ms.<br/>";
}
?>