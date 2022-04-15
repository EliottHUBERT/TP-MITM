<?php
    include('Fonction/connexion_sql.php');
    session_set_cookie_params(0);
    session_start();
    while (isset($nom_utilisateur)==true && isset($IDBinome)==true && isset($IDUtilisateur)==true){
        // setcookie('IDBinome',$IDBinome);
        // setcookie('IDUtilisateur',$IDUtilisateur);
        // setcookie('nomutilisateur',$nom_utilisateur);
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>connexion</title>
        <link rel="stylesheet" href="Styles/styles.css" type="text/css" />
        
    <button href='javascript:void(0)' onclick='clickMe()'>Supression cookie</button>
    <script>
    function clickMe() {
        var result ="<?php php_func()?>"
        document.write(result);
    }
    </script>
    


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
        GLOBAL $nom_utilisateur;
        $compteurbinomme=0;
        GLOBAL $compteurbinomme;
        
        if (isset($_POST["nomutilisateur"])){
            $nom_utilisateur=$_POST["nomutilisateur"];
            if($nom_utilisateur=='langloy'){ // Le nom peut etre changé
                setcookie('nomutilisateur','langloy');
                header('location: professeur/professeur.php');
            }
            elseif(isset($nom_utilisateur)){
                $lasuite=['A','Z','E','R','T','Y','U','I','O','P','Q','S','D','F','G','H','J','K','L','M','W','X','C','V','B','N','1','2','3','4','5','6','7','8','9','!','?'];
                $idutilisateur='';
                setcookie('nomutilisateur',$nom_utilisateur);

                for($i=0;$i<=10;$i++){ // generation de l'id utilisateur contenant 10 caractere 
                    $indice=rand(0,36);
                    $laval=$lasuite[$indice];
                    $idutilisateur=strval($idutilisateur).$laval;
                }
                $les_utilisateurs=[];
                $requete = "SELECT `login` FROM `utilisateur` ;";
                $resultat = $connexion->query($requete);
                while ($ligne = $resultat->fetch_assoc()) {
                    array_push($les_utilisateurs,$ligne['login']);
                }
                
                
                
                if($connexion){
                    if(in_array($nom_utilisateur,$les_utilisateurs)==false){
                        $requete = "INSERT INTO `utilisateur` (`id`, `idEleve`, `login`, `message`) VALUES (null, '$idutilisateur', '$nom_utilisateur', '');";
                        $larequete = mysqli_query($connexion,$requete);
                        
                        
                    }
                    if (isset($_POST["nom_binome"])==false){
                        echo"
                            <form method='POST'>
                                Entrez le nom de votre binome
                                <input name='nom_binome' class='nom_utilisateur'  placeholder='nom binome' required></input>
                                </br>
                                <input type='hidden' name='nomutilisateur' id='nom_utilisateur' value='".$nom_utilisateur."'required>
                                <input type='submit' value='Valider' class='BoutonValidation' >
                            </form>
                            ";
                    }
                    else { //isset($_POST["nom_binome"])
                        if($_POST["nom_binome"]==$nom_utilisateur){
                            echo"erreur votre nom de binome est le meme que votre nom d'utilisateur";
                        }
                        
                        elseif($compteurbinomme==0) {
                            $compteurbinomme+=1;
                            $le_binome=$_POST["nom_binome"];

                            $requete = "SELECT `id` FROM `utilisateur` WHERE `login`='$le_binome';";
                            $larequete = mysqli_query($connexion,$requete);
                            $resultatrequete=mysqli_fetch_array($larequete);
                            $lid_du_binome=$resultatrequete[0];
                            setcookie('IDBinome',$lid_du_binome);
                            
                            $requete = "SELECT `id` FROM `utilisateur` WHERE `login`='$nom_utilisateur';";
                            $larequete = mysqli_query($connexion,$requete);
                            $resultatrequete=mysqli_fetch_array($larequete);
                            $votreid=$resultatrequete[0];
                            setcookie('IDUtilisateur',$votreid);
                            ////////////////////////////////////////////////////////////////

                            $requete = "INSERT INTO `binome` (`ID1`, `ID2`) VALUES ('$votreid', '$lid_du_binome');";
                            $larequete = mysqli_query($connexion,$requete);
                        }
                        if(isset($_POST["messagesecret"])==false){
                            echo"
                            <form method='POST'>
                                Entrez votre message secret
                                <input name='messagesecret' class='nom_utilisateur'  placeholder='message secret' required></input>
                                </br>
                                <input type='hidden' name='nomutilisateur' id='nom_utilisateur' value='".$nom_utilisateur."'required>
                                <input type='hidden' name='nombinome' id='nom_utilisateur' value='".$le_binome."'required>
                                <input type='submit' value='Valider' class='BoutonValidation' >
                            </form>
                            ";
                        }
                        else{
                            $messagesecret=$_POST["messagesecret"];
                            echo'requete';
                            $requete = "UPDATE `utilisateur` SET `message` = '$messagesecret' WHERE `utilisateur`.`id` = '$votreid';";
                            $larequete = mysqli_query($connexion,$requete);
                            header("Location:eleve/interfaceEleve.php");
                        }
                    }

                    
                }

            }
        }
            ?>
        </form>
    </body>
    <?php
    function php_func(){
        echo"supression";
        foreach($_COOKIE as $cookie_name => $cookie_value){
            
            // Commence par supprimer la valeur du cookie
            unset($_COOKIE[$cookie_name]);
            
            // Puis désactive le cookie en lui fixant 
            // une date d'expiration dans le passé
            setcookie($cookie_name, '', time() - 4200, '/');
            echo 'le cookie'.$_COOKIE[$cookie_name];
        }
    }
    ?>
</html>