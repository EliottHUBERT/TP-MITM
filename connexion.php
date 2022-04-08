<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>connexion</title>
        <link rel="stylesheet" href="Styles/styles.css" type="text/css" />
        <?php
           include('Fonction/connexion_sql.php');
           session_set_cookie_params(1);
           session_start();
        ?>
    </head>
    
    <body>
        <?php
        if(isset($_POST["nomutilisateur"])==False){
            echo"
            <form method='POST'>
                Entrez votre nom d'utilisateur
                <input name='nomutilisateur' class='nom_utilisateur' id='nom_utilisateur'  placeholder='nom utilisateur' required></input>
                </br>
                <input type='submit' value='Valider' class='BoutonValidation' >
            </form>";
        }
        
        
        if (isset($_POST["nomutilisateur"])){
            $nom_utilisateur=$_POST["nomutilisateur"];
            if($nom_utilisateur=='langloy'){ // Le nom peut etre changé
                $_SESSION["nomutilisateur"]='langloy';
                header('location: professeur/professeur.php');
            }
            else{
                $lasuite=['A','Z','E','R','T','Y','U','I','O','P','Q','S','D','F','G','H','J','K','L','M','W','X','C','V','B','N','1','2','3','4','5','6','7','8','9','!','?'];
                $idutilisateur='';
                $_SESSION["nomutilisateur"]=$nom_utilisateur;

                for($i=0;$i<=10;$i++){ // generation de l'id utilisateur contenant 10 caractere 
                    $indice=rand(0,36);
                    $laval=$lasuite[$indice];
                    $idutilisateur=strval($idutilisateur).$laval;
                }
                
                
                if($connexion){
                    $requete = "INSERT INTO `utilisateur` (`id`, `idEleve`, `login`, `message`) VALUES (null, '$idutilisateur', '$nom_utilisateur', '');";
                    $larequete = mysqli_query($connexion,$requete);
                    echo'insertion réussie</br>';
                
                    echo"
                        <form method='POST'>
                            Entrez le nom de votre binome
                            <input name='nom_binome' class='nom_utilisateur'  placeholder='nom binome' required></input>
                            </br>
                            <input type='hidden' name='nomutilisateur' id='nom_utilisateur' required>
                            <input type='submit' value='Valider' class='BoutonValidation' >
                        </form>
                        ";

                    if (isset($_POST["nom_binome"])){
                        if($_POST["nom_binome"]==$nom_utilisateur){
                            echo"erreur votre nom de binom est le meme que votre nom d'utilisateur";
                        }
                        else {
                            $le_binome=$_POST["nom_binome"];

                            $requete = "SELECT `id` FROM `utilisateur` WHERE `login`='$le_binome';";
                            $larequete = mysqli_query($connexion,$requete);
                            $resultatrequete=mysqli_fetch_array($larequete);
                            $lid_du_binome=$resultatrequete[0];
                            echo $lid_du_binome;
                            
                            
                            $requete = "SELECT `id` FROM `utilisateur` WHERE `login`='$nom_utilisateur';";
                            $larequete = mysqli_query($connexion,$requete);
                            $resultatrequete=mysqli_fetch_array($larequete);
                            $votreid=$resultatrequete[0];
                            echo $votreid;

                            $requete = "INSERT INTO `binome` (`ID1`, `ID2`) VALUES ('$votreid', '$lid_du_binome');";
                            $larequete = mysqli_query($connexion,$requete);
                        }
                    }

                    
                }

            }
        }
            ?>
        </form>
    </body>
</html>