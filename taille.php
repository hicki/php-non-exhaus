<?php
function taille_fichier($octets) {
    $resultat = $octets;
    for ($i=0; $i < 8 && $resultat >= 1000; $i++) {
        $resultat = $resultat / 1000;
    }
    if ($i > 0) {
        return preg_replace('/,00$/', '', number_format($resultat, 2, ',', '')) 
. ' ' . substr('KMGTPEZY',$i-1,1) . 'o';
    } else {
        return $resultat . ' o';
    }
}
if (!empty($_POST['taille']))
{
echo taille_fichier($_POST['taille']);  // affiche : 1 Ko [display : 1 Ko]
}
else
{
?>
<form action="/taille.php" method="post" >
<input type="text" name="taille" >
<?php
}
?>