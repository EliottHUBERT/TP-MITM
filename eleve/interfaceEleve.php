<?php
$idrep = 0;
setcookie('id',$idrep);
session_set_cookie_params(0);
include ('../Fonction/fonction.php');
$con = mysqli_connect('localhost','root','','mitm');
//ini_set('display_errors', 'off');
$IDEleve = "I3U2C9JPLNM";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <link href="../Styles/styles.css" rel="stylesheet" type="text/css">
        <!-- <link href="../Styles/overflow.css" rel="stylesheet" type="text/css"> -->
        <title> Interface Eleve </title>
    </head>
    <body>
        <div id="requete">
            <form method="post">
                <select id="bouton" name="actionBien">
                    <option value="valeur0"></option>
                    <option value="valeur1" selected>Afficher les ID/Etudiants</option>
                    <option value="valeur2">Etablir la communication avec un ID</option>
                    <option value="valeur3">Identification via login / pass auprès d’un ID</option>
                    <option value="valeur4">Message secret auprès d’un ID</option>
                </select>
                
                <br>    
                <br>
                Entrez l'id si besoin : <input type='text' name='idEleve'>
                
                <input type="submit" value="Valider">
            </form>
        </div>
        <?php
            
            if (isset($_POST['actionBien'])) {

                // Afficher les ID/Etudiants    
                if($_POST['actionBien'] == "valeur1") {
                    $mysqli = new mysqli("localhost", "root", "", "mitm");
                    $requete = "SELECT * FROM utilisateur";
                    $resultat = $mysqli->query($requete);
                    $idrep = $_COOKIE['id'];
                    while ($ligne = $resultat->fetch_assoc()) {
                        $reponse = $ligne['idEleve'] . ' ' . $ligne['login'] . '<br>';
                        setcookie($idrep, $reponse);
                        $idrep = $idrep + 1;
                        setcookie('id', $idrep);
                    }
                    
                }


                //Etablir la communication avec un ID
                elseif($_POST['actionBien'] == "valeur2" && $_POST["idEleve"] !== "") {
                    $idEleveCommunicant = $_POST["idEleve"];

                    $requete_presence_com = "SELECT * FROM `communication` WHERE `idEleve1` = '$IDEleve' AND `idEleve2` = '$idEleveCommunicant';";
                    $presence_com = mysqli_query($con, $requete_presence_com);
                    $idrep = $_COOKIE['id'];
                    if(mysqli_num_rows($presence_com)) {
                        $reponse ='la communication est déjà établie avec cet id<br>';
                        setcookie($idrep, $reponse);
                        $idrep = $idrep + 1;
                        setcookie('id', $idrep);
                    } 
                    else { 
                        $requete1 = "INSERT INTO `communication` (`idCommunication`, `idEleve1`, `idEleve2`) VALUES (NULL, '$IDEleve', '$idEleveCommunicant');";
                        $result = mysqli_query($con, $requete1);
                        $reponse ='communication établie<br>';
                        setcookie($idrep, $reponse);
                        $idrep = $idrep + 1;
                        setcookie('id', $idrep);
                    }
                    
                }


                //Identification via login / pass auprès d’un ID 
                if($_POST['actionBien'] == "valeur3") {

                }


                //Message secret auprès d’un ID
                if($_POST['actionBien'] == "valeur4") {

                }
            }
        ?>
        
        <div class="console_reponse">
            <div class="reponse">
                <br>
                <p><?php 
                    $idrep = $_COOKIE['id'];
                    foreach(range(0, 100)as $num){
                        if (isset($_COOKIE[$num])){
                        echo $_COOKIE[$num];
                        }
                        else{
                            return;
                        }
                    }
                ?><br></p>
                <br>
            </div>
        </div>
    </body>
</html>
