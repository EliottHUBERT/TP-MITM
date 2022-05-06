<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Page admin</title>
    <link rel="stylesheet" href="#">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>
<body>
    <header>
        <h1>TP Man In The Midle</h1>
        <p>en attente de la fin de la phase</p>
        <div class="compteur">0/n</div>
    </header>
    <div class="container">
        <div class="restant">
            <div class="text">Il reste encore n personne</div>
        </div>
        <div class="temps">
            <div class="text">La phase dure :</div>
        </div>
        <div class="personne">
            <div class="test">
                <?php
                // tu est machin
                   echo "tu es ".$_SESSION['utilisateur'];
                // tu as fait intel action bien
                    $actionBien=$_POST['actionBien'];
                    switch ($actionBien) {
                        case '1':
                            echo "Afficher les ID/Etudiants";
                            break;
                        case '2':
                            echo "Etablir la communication avec un ID";
                            break;
                        case '3':
                            echo "Identification via login / pass auprès d’un ID";
                            break;
                        case '4':
                            echo "Message secret auprès d’un ID";
                            break;
                        default:
                            echo "Pas d'action pris en compte";
                            break;
                    }
                    //sur qui

                // tu as fais intel action mauvaise

                    //sur qui
                ?>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>