<?php
//Générer une chaine de caractère unique et aléatoire
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

// APPEL
// Génère une chaine de longueur 20
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