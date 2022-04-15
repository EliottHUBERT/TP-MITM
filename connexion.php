<html>
    <head>
        <meta charset="utf-8">
        <title>connexion</title>
        <link rel="stylesheet" href="Styles/styles.css" type="text/css" />
        <?php
            include('Fonction/connexion_sql.php');
            session_set_cookie_params(0);
            session_start();
        ?>
    </head>
    <body> 
        <button href='javascript:void(0)' onclick='clickMe()'>Supression cookie</button>

        <?php
            
            if(isset($_POST["nomutilisateur"])==False){
                formulaire_1();
            }
            elseif(isset($_POST["nomutilisateur"])){
                $nom_utilisateur=$_POST["nomutilisateur"];
                
                
                // $les_utilisateurs=[];
                // $requete = "SELECT `UTILLogin ` FROM `utilisateur` ;";
                // $resultat = $connexion->query($requete);
                // while ($ligne = $resultat->fetch_assoc()) {
                //     array_push($les_utilisateurs,$ligne['login']);
                // }
                // //////////////////////////////////////////////////////////////
                
                // if(in_array($nom_utilisateur,$les_utilisateurs)==false){
                //     $requete = "INSERT INTO `utilisateur` (`UTILId`, `UTILIdEleve`, `UTILLogin`, `UTILMessage`) VALUES (null, '$idutilisateur', '$nom_utilisateur', '');";
                //     $larequete = mysqli_query($connexion,$requete);
                // }

                if(isset($_POST["nom_binome"])==false){
                    if($nom_utilisateur=='langloy'){ // Le nom peut etre changé
                        setcookie('nomutilisateur','langloy');
                        header('location: professeur/professeur.php');
                    }
                    
                    formulaire_2($nom_utilisateur);

                    $idutilisateur = generationID($nom_utilisateur,$connexion);
                    $requete = "INSERT INTO `utilisateur` (`UTILId`, `UTILIdEleve`, `UTILLogin`, `UTILMessage`) VALUES (null, '$idutilisateur', '$nom_utilisateur', '');";
                    $larequete = mysqli_query($connexion,$requete);
                }
                elseif(isset($_POST["nom_binome"])){
                    if($_POST["nom_binome"]==$nom_utilisateur){
                        echo"erreur votre nom de binome est le meme que votre nom d'utilisateur";
                    }
                    else{
                        $le_binome=$_POST["nom_binome"];

                        $requete = "SELECT `UTILId` FROM `utilisateur` WHERE `UTILLogin`='$le_binome';";
                        $larequete = mysqli_query($connexion,$requete);
                        $resultatrequete=mysqli_fetch_array($larequete);
                        $lid_du_binome=$resultatrequete[0];
                        setcookie('IDBinome',$lid_du_binome);
                        echo "l'id de l'autre est ".$lid_du_binome;
                        ////////////////////////////////////////////////////////////////
                        
                        $requete = "SELECT `UTILId` FROM `utilisateur` WHERE `UTILLogin`='$nom_utilisateur';";
                        $larequete = mysqli_query($connexion,$requete);
                        $resultatrequete=mysqli_fetch_array($larequete);
                        $votreid=$resultatrequete[0];
                        setcookie('IDUtilisateur',$votreid);
                        echo "ton id est ".$votreid;
                        ////////////////////////////////////////////////////////////////

                        $requete = "INSERT INTO `binome` (`UTILId1`, `UTILId2`) VALUES ('$votreid', '$lid_du_binome');";
                        $larequete = mysqli_query($connexion,$requete);
                        echo "ajout du binome";
                        ////////////////////////////////////////////////////////////////


                        $messagesecret=$_POST["messagesecret"];
                        $requete = "UPDATE `utilisateur` SET `UTILMessage` = '$messagesecret' WHERE `utilisateur`.`UTILId` = '$votreid';";
                        $larequete = mysqli_query($connexion,$requete);
                        header("Location:eleve/interfaceEleve.php");
                    }
                }
                
            }
                      
           
        ?>
    </body>
        
        
        <?php
            function formulaire_1(){
                echo"
                <form method='POST'>
                    Entrez votre nom d'utilisateur
                    <input name='nomutilisateur' class='nom_utilisateur' id='nom_utilisateur'  placeholder='nom utilisateur' required></input>
                    </br>
                    <input type='submit' value='Valider' class='BoutonValidation' >
                </form>";
            }

            function formulaire_2($nom_utilisateur){
                echo"
                <form method='POST'>
                    
                    <input type='hidden' name='nomutilisateur' id='nom_utilisateur' value='".$nom_utilisateur."'required>
                    Entrez le nom de votre binome
                    <input name='nom_binome' class='nom_utilisateur'  placeholder='nom binome' required></input>
                    </br>
                    Entrez votre message secret
                    <input name='messagesecret' class='nom_utilisateur'  placeholder='message secret' required></input>
                    </br>
                    <input type='submit' value='Valider' class='BoutonValidation' >
                </form>";
            }

            function generationID($nom_utilisateur,$connexion){
                $lasuite=['A','Z','E','R','T','Y','U','I','O','P','Q','S','D','F','G','H','J','K','L','M','W','X','C','V','B','N','1','2','3','4','5','6','7','8','9','!','?'];
                $idutilisateur='';
                

                for($i=0;$i<=10;$i++){ // generation de l'id utilisateur contenant 10 caractere 
                    $indice=rand(0,36);
                    $laval=$lasuite[$indice];
                    $idutilisateur=strval($idutilisateur).$laval;
                }
                return $idutilisateur;
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////
            
        ?>
</html>
