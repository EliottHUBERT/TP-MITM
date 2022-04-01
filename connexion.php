<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="Styles/styles.css" type="text/css" />
        <?php
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
                
                for($i=0;$i<=10;$i++){
                    $indice=rand(0,36);
                    $laval=$lasuite[$indice];
                    $idutilisateur=strval($idutilisateur).$laval;
                }
                echo $idutilisateur;
                // echo"
                // <form method='POST'>
                //     Entrez votre nom d'utilisateur
                //     <input name='nomutilisateur' class='nom_utilisateur' id='nom_utilisateur'  placeholder='nom utilisateur' required></input>
                //     </br>
                //     <input type='submit' value='Valider' class='BoutonValidation' >
                // </form>
                //";


            }
        }
            ?>
        </form>
    </body>
</html>