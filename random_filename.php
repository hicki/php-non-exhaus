<?php

function _e($text) {
  // Get the language your browser support
  $langPartials = explode(',', filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE'));
  $lang = 'en';
  if ($langPartials) {
    $lang = $langPartials[0];
  }

  // List of translations
  $translations = [
    'en' => [
      'TITLE' => 'Random Filename',
      'GENERATE' => 'Generate',
      'YOUR_FILENAME' => 'Your filename is ',
      'HELP' => 'Enter an extension to the file and click Generate or press Enter',
    ],
    'fr' => [
      'TITLE' => 'Nom de fichier aléatoire',
      'GENERATE' => 'Générer',
      'YOUR_FILENAME' => 'Votre nom de fichier est ',
      'HELP' => 'Entrez une extension dans le fichier et cliquez sur Générer ou appuyez sur Entrée',
    ],
    'es' => [
      'TITLE' => 'Nombre de archivo aleatorio',
      'GENERATE' => 'Generar',
      'YOUR_FILENAME' => 'Su nombre de archivo es ',
      'HELP' => 'Introduzca una extensión en el archivo y haga clic en Generar o pulse Intro',
    ],
    'pt' => [
      'TITLE' => 'Nome do Arquivo Aleatório',
      'GENERATE' => 'Gerar',
      'YOUR_FILENAME' => 'Seu nome de arquivo é ',
      'HELP' => 'Digite uma extensão no arquivo e clique em Gerar ou pressione Enter',
    ],
  ];

  // One more attempt to find the language
  if (!isset($translations[$lang])) {
    $notFound = true;
    foreach ($translations as $language => $value) {
      $languagePartials = explode('-', $language);
      $broeserLanguagePartials = explode('-', $lang);
      if ($languagePartials[0] == $broeserLanguagePartials[0]) {
        $lang = $language;
        $notFound = false;
        break;
      }
    }
    if ($notFound) {
      $lang = 'en';
    }
  }

  echo ($translations[$lang][strtoupper($text)] ?? $text);
}


// Generate the random filename and concatenate its extension
function randomFilename($extension = null) {
  $s = strtoupper(md5(uniqid(rand(),true)));
  $filename =
      substr($s,0,8) . '-' .
      substr($s,8,4) . '-' .
      substr($s,12,4). '-' .
      substr($s,16,4). '-' .
      substr($s,20);
  return $filename . '.' . $extension;
}

$filename = null;

// Get the file extension sent by the user
$extension = filter_input(INPUT_GET, 'extension');
if($extension) {
  $filename = randomFilename(str_replace('.', '', $extension));
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php _e('title'); ?></title>
  </head>
  <body>
    <form method="GET">
        <input type="text" name="extension" value="<?php echo $extension; ?>">
        <button type="submit"><?php _e('generate'); ?></button>
    </form>
    <br>
    <?php if($filename):
      _e('your_filename'); ?> <strong><?php echo $filename; ?></strong>
    <?php else:
      _e('help');
    endif; ?>
  </body>
</html>
