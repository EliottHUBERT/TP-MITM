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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
