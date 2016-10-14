<?
if(isset($_POST['requete']) && $_POST['requete'] != NULL) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{

try 
{
	$conn = new PDO('mysql:host=the-scientist.fr.mysql;dbname=the_scientist_f;pass=experimentboy;charset=utf8', 'the_scientist_f', 'experimentboy');	
} 
catch (Exception $e) 
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$nb_resultats_value = 0;
$nb_resultats = 1;
$requete = htmlspecialchars($_POST['requete']);

$sql = "SELECT * FROM mot_fr WHERE mot LIKE '%" . $requete . "%' ORDER BY id DESC";
/** $req = $conn->query($sql); */
/** while ($donnees = $req->fetch(PDO::ATTR_DEFAULT_FETCH_MODE)) */

if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la tâche.
?>
<h3>Résultats de votre recherche.</h3>
<p>Nous avons trouvé <? echo $nb_resultats; // on affiche le nombre de résultats 
if($nb_resultats > 1) { echo 'résultats'; } else { echo 'résultat'; } // on vérifie le nombre de résultats pour orthographier correctement. 
?>
dans notre base de données. Voici les fonctions que nous avons trouvées :<br/>
<br/>
<?
for ($conn->query($sql); $conn = $donnees;) 
{ ?>
<a href="recherche_mot_fr.php?id=<? echo $donnees['id']; ?>"><? echo $donnees['mot']; ?></a><br/>
<?
}// fin de la boucle
?><br/>
<br/>
<a href="rechercher.php">Faire une nouvelle recherche</a></p>
<?# code...
}
 foreach($conn->query($sql) as $donnees) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<a href="recherche_mot_fr.php?id=<? echo $donnees['id']; ?>"><? echo $donnees['mot']; ?></a><br/>
<?
}// fin de la boucle
?><br/>
<br/>
<a href="rechercher.php">Faire une nouvelle recherche</a></p>
<?
} // Fini d'afficher les résultats ! Maintenant, nous allons afficher l'éventuelle erreur en cas d'échec de recherche et le formulaire.
else
{ // de nouveau, un peu de HTML
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre requête "<? echo $_POST['requete']; ?>". <a href="recherche_mot_fr.php">Réessayez</a> avec autre chose.</p>
<?
}// Fini d'afficher l'erreur ^^
 // on ferme mysql, on n'en a plus besoin
 // et voilà le formulaire, en HTML de nouveau !
?>
<p>Vous allez faire une recherche dans notre base de données concernant la liste de tout les mots de français. Tapez une requête pour réaliser une recherche.</p>
 <form action="recherche_mot_fr.php" method="Post">
<input type="text" name="requete" size="10">
<input type="submit" value="Ok">
</form>
<?

// et voilà, c'est fini !
?>
