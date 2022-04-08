<?php
session_set_cookie_params(0);
session_start();
include ('../fonction.php');
$con = mysqli_connect('localhost','root','','mitm');
$variableLocalIdEleveConnectéMdrLaVaribaleEstTropLongueLol = "I3U2C9JPLNM";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <link href="../Styles/styles.css" rel="stylesheet" type="text/css">
        <title> Interface Eleve </title>
    </head>
    <body>
        <form method="post">
            <select id="bouton" name="actionBien">
                <option value="valeur0"></option>
                <option value="valeur1">Afficher les ID/Etudiants</option>
                <option value="valeur2">Etablir la communication avec un ID</option>
                <option value="valeur3">Identification via login / pass auprès d’un ID</option>
                <option value="valeur4">Message secret auprès d’un ID</option>
            </select>
            <br>    
            <br>
            Entrez l'id si besoin : <input type="text" name="idEleve">
            <input type="submit" value="Valider">
        </form>

        <?php
            $idses = 0;
            if (isset($_POST['actionBien'])) {

                // Afficher les ID/Etudiants    
                if($_POST['actionBien'] == "valeur1") {
                    $mysqli = new mysqli("localhost", "root", "", "mitm");
                    $requete = "SELECT * FROM utilisateur";
                    $resultat = $mysqli->query($requete);
                    while ($ligne = $resultat->fetch_assoc()) {
                        $_SESSION['reponse'[$idses]] = $ligne['idEleve'] . ' ' . $ligne['login'] . '<br>';
                        $idses = $idses +1;
                    }
                }


                //Etablir la communication avec un ID
                if($_POST['actionBien'] == "valeur2" && $_POST["idEleve"] !== "") {
                    $idEleveCommunicant = $_POST["idEleve"];

                    $requete_presence_formateur = "SELECT * FROM `communication` WHERE `idEleve1` = '$variableLocalIdEleveConnectéMdrLaVaribaleEstTropLongueLol' AND `idEleve2` = '$idEleveCommunicant';";
                    $presence_formateur = mysqli_query($con, $requete_presence_formateur);
                    if(mysqli_num_rows($presence_formateur)) {
                        echo 'la communication est déjà établie';
                    } 
                    else { 
                        $requete1 = "INSERT INTO `communication` (`idCommunication`, `idEleve1`, `idEleve2`) VALUES (NULL, '$variableLocalIdEleveConnectéMdrLaVaribaleEstTropLongueLol', '$idEleveCommunicant');";
                        $result = mysqli_query($con, $requete1);
                        echo 'connexion etablie';
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
                    foreach(range(0, $idses-1)as $num){
                        echo $_SESSION['reponse'[$num]];
                    }
                ?></p>
                <br>
            </div>
        </div>
    </body>
</html>
<?php 
session_destroy()
?>