<?php
include ('../fonction.php');
$con = mysqli_connect('localhost','root','','mitm');
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
                        echo $ligne['idEleve'] . ' ' . $ligne['login'] . '<br>';
                    }
                }


                //Etablir la communication avec un ID
                if($_POST['actionBien'] == "valeur2" && $_POST["idEleve"] !== "") {
                   echo "test";
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
                <p>sqdqsd</p>
                <br>
            </div>
        </div>
    </body>
</html>