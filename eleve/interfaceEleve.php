<?php
header("Refresh");
$idrep = 0;
setcookie('id',$idrep);
session_set_cookie_params(0);
include ('../Fonction/fonction.php');
$con = mysqli_connect('localhost','root','','mitm');
//ini_set('display_errors', 'off');
if (isset($_COOKIE['IDUtilisateur'])) {
    $IDEleve = $_COOKIE['IDUtilisateur'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <link href="../Styles/styles.css" rel="stylesheet" type="text/css">
        <!-- <link href="../Styles/overflow.css" rel="stylesheet" type="text/css"> -->
        <title> Interface Eleve </title>
        <!-- <script type="text/javascript">
        function scrolldiv() {//permet de scroll en bas de la console dàe réponse
            document.getElementById('scroll').scrollTop = 99999999999999;
        }
</script> -->
    </head>
    <a href='../briefing.php' target='_blank'>Briefing</a>
    
    <body onload="scrolldiv()">
        <div id="requete">
            <form method="post">
                <label>
                    <select id="bouton" class="actionBien" name="actionBien">
                        <option value="">Veuillez selectionner une action...</option>
                        <option value="valeur1">Afficher les ID/Etudiants</option>
                        <option value="valeur2">Etablir la communication avec un ID</option>
                        <option value="valeur3">Identification via login / pass auprès d’un ID</option>
                        <option value="valeur4">Message secret auprès d’un ID</option>
                    </select>
                </label>
                <br>    
                <br>
                
                Entrez un message si besoin : <input type='text' name='message' placeholder="Entrer le message...">
                

                
                
                
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
                    if (isset($_COOKIE['id'])){
                        $idrep = $_COOKIE['id'];
                    }
                    while ($ligne = $resultat->fetch_assoc()) {
                        $reponse = $ligne['UTILIdEleve'] . ' ' . $ligne['UTILLogin'] . '<br>';
                        setcookie($idrep, $reponse, time()+3600*24);
                        $idrep = $idrep + 1;
                        setcookie('id', $idrep);
                    }
                    
                }


                //Etablir la communication avec un ID
                elseif($_POST['actionBien'] == "valeur2") {
                    echo "Entrez l id si besoin : <input type='text' name='idEleve' placeholder='Entrer le id...'>";
                    if ($_POST["idEleve"] !== "") {
                        $idEleveCommunicant = $_POST["idEleve"];

                        $requete_presence_com = "SELECT * FROM `communication` WHERE `idEleve1` = '$IDEleve' AND `idEleve2` = '$idEleveCommunicant';";
                        $presence_com = mysqli_query($con, $requete_presence_com);
                        $idrep = $_COOKIE['id'];
                        if(mysqli_num_rows($presence_com)) {
                            $reponse ='la communication est déjà établie avec cet id<br>';
                            setcookie($idrep, $reponse, time()+3600*24);
                            $idrep = $idrep + 1;
                            setcookie('id', $idrep);
                        } 
                        else { 
                            $requete1 = "INSERT INTO `communication` (`idCommunication`, `idEleve1`, `idEleve2`) VALUES (NULL, '$IDEleve', '$idEleveCommunicant');";
                            $result = mysqli_query($con, $requete1);
                            $reponse ='communication établie<br>';
                            setcookie($idrep, $reponse, time()+3600*24);
                            $idrep = $idrep + 1;
                            setcookie('id', $idrep);
                        }
                    
                    }
                }


                //Identification via login / pass auprès d’un ID 
                if($_POST['actionBien'] == "valeur3") {

                }


                //Message secret auprès d’un ID : Envoie  du message a notre binome
                elseif($_POST['actionBien'] == "valeur4" && $_POST["message"] !== "" && $_POST["idEleve"] !== "") {
                    $MESId = $_COOKIE['IDUtilisateur'];
                    $idEleve = $_POST["idEleve"];
                    $message = $_POST["message"];
                    $requete = "INSERT INTO `message` (`MESId`, `MESEnvoyeur`, `MESDestinataire`, `MESContenu`) VALUES (NULL, '$MESId', '$idEleve', '$message');";
                    $lexecution = mysqli_query($mysqli, $requete);

                }
            }

        ?>
        
        <div class="console_reponse" id="scroll">
            <div class="reponse">
                <br>
                <p><?php 
                if (isset($_COOKIE['id'])) {
                    $idrep = $_COOKIE['id'];
                }
                    foreach(range(0, 100000)as $num){
                        if (isset($_COOKIE[$num])){
                        echo $_COOKIE[$num];
                        }
                    }
                ?><br></p>
                <br>
            </div>
        </div>
    </body>
    
</html>
