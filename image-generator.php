<?php
header ("Content-type: image/png");
$image = imagecreate(2000,500);

$orange = imagecolorallocate($image, 255, 128, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 160, 1400, 450, "Hey !", $blanc);

imagepng($image);
?>
