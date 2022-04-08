<?php
$ipserveur=$_SERVER['REMOTE_ADDR'];
$ip=$_SERVER['SERVER_ADDR'];
if ($ip==$ipserveur){
    header('admin.php');
}else {
    header('../connexion.php');
}
include ('../Fonction/connexion_sql.php')
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page admin</tittle>
</head>
<body>
</body>
</html>
