<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur [test if the file has been sent and if there is no error]
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros [test if the file is not very large]
        if ($_FILES['monfichier']['size'] <= 10000000)
        {
                // Testons si l'extension est autorisée [test if the extension is allowed]
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement [we can validate the file and store it]
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
}
else
{
   echo "Error!"
}
?>