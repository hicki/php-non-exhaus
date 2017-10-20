<?php
//Générer une chaine de caractère unique et aléatoire [generate unique random string]
if (!empty($_GET['longueur']))
{
function random($car) {
$string = "";
$chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
srand((double)microtime()*1000000);
for($i=0; $i<$car; $i++) {
$string .= $chaine[rand()%strlen($chaine)];
}
return $string;
}

// APPEL [call]
// Génère une chaine de longueur 20 [generate a string of 20 characters]
$chaine = random($_GET['longueur']);

echo "Voilà la chaîne de ".$_GET['longueur']." caractère unique et aléatoire : ".$chaine;
}
else
{
    ?>
        <form action="random_text.php" method="GET">
            <input type="number" name="longueur">
        </form>
    <?php
}
?>