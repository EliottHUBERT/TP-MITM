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
        if(isset($_POST["nombreutilisateurs"])==False){
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
                echo"lenom";
                $_SESSION["nomutilisateur"]=$nom_utilisateur;
                header('location: professeur/professeur.php');
            }
            else{
                

            }
        }
            ?>
        </form>
    </body>
</html>