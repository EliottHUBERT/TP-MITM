
<html>
    <head>
        <meta charset="utf-8">
        <title>creation-TP</title>
        <link rel="stylesheet" href="Styles/styles.css" type="text/css" />
        <?php
           session_set_cookie_params(1);
           session_start();
           include('Fonction/connexion_sql.php');
        ?>
    </head>

    <body>  
            <?php
                
                $messagesecret='test';
                $votreid=8;
                $requete = "UPDATE `utilisateur` SET `message` = '$messagesecret' WHERE `utilisateur`.`id` = '$votreid';";
                $larequete = mysqli_query($connexion,$requete);
            ?>
    </div>

</html>
