<?php
session_set_cookie_params(0);
session_start();
include ('../fonction.php');
$con = mysqli_connect('localhost','root','','mitm');
ini_set('display_errors', 'off');
$idses = $_SESSION['id'];
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
            
            if (isset($_POST['actionBien'])) {

                // Afficher les ID/Etudiants    
                if($_POST['actionBien'] == "valeur1") {
                    $mysqli = new mysqli("localhost", "root", "", "mitm");
                    $requete = "SELECT * FROM utilisateur";
                    $resultat = $mysqli->query($requete);
                    while ($ligne = $resultat->fetch_assoc()) {
                        $idses = $_SESSION['id'];
                        $_SESSION['reponse'[$idses]] = $ligne['idEleve'] . ' ' . $ligne['login'] . '<br>';
                        $idses = $idses +1;
                        $_SESSION['id'] = $idses;
                    }
                }


                //Etablir la communication avec un ID
                if($_POST['actionBien'] == "valeur2" && $_POST["idEleve"] !== "") {
                    $idses = $_SESSION['id'];
                    $_SESSION['reponse'[$idses]] = "test <br>";
                    $idses = $idses +1;
                    $_SESSION['id'] = $idses;
                }


                //Identification via login / pass auprès d’un ID 
                if($_POST['actionBien'] == "valeur2") {

                }


                //Message secret auprès d’un ID
                if($_POST['actionBien'] == "valeur2") {

                }


            }
        ?>
        
        <div class="console_reponse">
            <div class="reponse">
                <br>
                <p><?php 
                    $idses = $_SESSION['id'];
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
// session_destroy()
?>