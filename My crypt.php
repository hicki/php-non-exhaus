<?php
// Sources www.stackoverflow.com

function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}
if (isset($_POST['msg']) AND isset($_POST['cle']))
{
    echo "Message crypté : " . encrypt($_POST['msg'], $_POST['cle']);
    echo "<br/>Message décrypté : " . decrypt($_POST['msg'], $_POST['cle']);
}
else
{
    ?><form action="My%20crypt.php" method="post" >
         <label>Message: <input type="text" name="msg" ><br/></label>
         <label>Clé: <input type="text" name="cle" ></label>
         <input type="submit" value="Envoyer!" >
    </form><?php
}
?>