<?php
//header('Content-type: image/jpeg');
$source = imagecreatefromjpeg('3.jpg');
$rotate = imagerotate($source,90,0);
imagejpeg($rotate,'myNEWimage.jpg');
//file_put_contents("myNEWimage.jpg",$rotate);
//echo '<img src="3.jpg">';

?>