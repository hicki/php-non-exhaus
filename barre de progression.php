
<?php

	
	
	$img_width = 115;
	$img_height = 28;
	$color_txt = "red";
	$color_face = "green";
	$color_border = "red";
	$color_backgrnd = "blue";
	$taille_texte = 5;
	$valeur = 10/20;
	$valeur_max = 20/20;
	$arrondi = 2;
	$nom_fichier = "../";


/*
*	This method generates the progressbar
*	
*/
function générer_progressbar($img_width, $img_height, $color_txt, $color_face, $color_border, $color_backgrnd, $taille_texte, $valeur, $valeur_max, $arrondi, $nom_fichier){
	switch ($taille_texte){		//va permettre de centrer le texte en fonction de la taille du texte choisie [will allow centering the text according to the size of the chosen text]
		case 1:
			$largeur_caractere = 5;
			$hauteur_caractere = 7;
			break;
		case 2:
			$largeur_caractere = 6;
			$hauteur_caractere = 10;
			break;
		case 3:
			$largeur_caractere = 7;
			$hauteur_caractere = 12;
			break;
		case 4:
			$largeur_caractere = 8;
			$hauteur_caractere = 13;
			break;
		case 5:
			$largeur_caractere = 9;
			$hauteur_caractere = 14;
			break;
	}
	if ($valeur === -1){
		$pourcent = 0;
		$str_pourcent = "Aucun parametre !";
	} else {
		$pourcent = $valeur * 100 / $valeur_max;	//calcul du vrai pourcentage (sur 100) [calculation of the true percentage (out of 100)]
		$str_pourcent = number_format($pourcent, $arrondi, ',', ' ');	//met en forme le pourcentage [formats the percentage]
	}
	
	$len_pourcent = strlen($str_pourcent) + 1;	//on récupère le nombre de caractères ta texte qui sera affiché (le +1 c'est parce qu'on ajoutera le sigle %) [retrieve the number of characters your text will be displayed (+1 for adding % sign)]
	$pos_pourcent = $pourcent * $img_width / 100;	//calcul de la partie à colorer en fonction de la taille de l'image [calculate the part to be coloured based on the size of the image]
	$im = @imagecreate($img_width, $img_height) or die ("Impossible d'initialiser la librairie GD");
	// Fond et couleur de texte [background and colour of the text]
	imagecolorallocate($im, $color_backgrnd[0], $color_backgrnd[1], $color_backgrnd[2]); // background
	$color_border = imagecolorallocate($im, $color_border[0], $color_border[1], $color_border[2]);	//conversion des couleurs [conversion of the colours]
	$color_face = imagecolorallocate($im, $color_face[0], $color_face[1], $color_face[2]);	//conversion des couleurs [conversion of the colours]
	
	for ($i = 0; $i < $pos_pourcent; $i++){	//boucle pour colorer la partie correspondant au pourcentage [loop to colour the part corresponding to the percentage]
		imageline($im, $i, 0, $i, $img_height, $color_face);
	}
	
	imageline($im, 0, 0, $img_width, 0, $color_border); // Bordure horizontale supérieure [border top]
	imageline($im, 0, 0, 0, $img_height, $color_border); // Bordure verticale de gauche [border left]
	imageline($im, 0, $img_height-1, $img_width-1, $img_height-1, $color_border); // Bordure horizontale inférieure [border bottom]
	imageline($im, $img_width-1, 0, $img_width-1, $img_height-1, $color_border); // Bordure verticale de droite [border right]
	// Texte [Text]
	$posX_str_pourcent = ($img_width - $len_pourcent * $largeur_caractere) / 2;	//calcule la position X du texte [calculate the X position of the text]
	$posY_str_pourcent = ($img_height - $hauteur_caractere) / 2;	//calcule la position Y du texte [calculate the Y position of the text]
	if ($valeur === -1){
		imagestring ($im, $taille_texte, $posX_str_pourcent, $posY_str_pourcent, $str_pourcent, imagecolorallocate($im, $color_txt[0], $color_txt[1], $color_txt[2]));
	} else {
		//bool imagestring  ( resource $image  , int $font  , int $x  , int $y  , string $string  , int $color  )
		imagestring ($im, $taille_texte, $posX_str_pourcent, $posY_str_pourcent, $str_pourcent. "%", imagecolorallocate($im, $color_txt[0], $color_txt[1], $color_txt[2]));
	}
	// Création du PNG [creation of the PNG]
	return imagepng ($im, $nom_fichier, 0, NULL);
}
générer_progressbar($img_width, $img_height, $color_txt, $color_face, $color_border, $color_backgrnd, $taille_texte, $valeur, $valeur_max, $arrondi, $nom_fichier);
?>

