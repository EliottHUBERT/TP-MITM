<?php

include '../fonction.php';
if (verifip()){
    header('Location:../connexion.php');
}
require ('../Fonction/connexion_sql.php')


?>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page admin</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <h1>Page admin </h1>
    <?php
    if(isset($_POST['del'])){
        $query="DELETE FROM binome;";
        $result = mysqli_query($connexion, $query);
        $query="DELETE FROM utilisateur";
        $result = mysqli_query($connexion, $query);
    }
    ?>
    <form method="post">
        <input type="submit" class="button" name="del" value="del" />
    <form>
</body>
</html>
