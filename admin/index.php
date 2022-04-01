<?php
$ipserveur=$_SERVER['REMOTE_ADDR'];
$ip=$_SERVER['SERVER_ADDR'];
if ($ip==$ipserveur){
    header('admin.php');
}else {
    header('../connexion.php');
}   
?>