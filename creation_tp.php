
<html>
    <head>
        <meta charset="utf-8">
        <title>creation-TP</title>
        <link rel="stylesheet" href="Styles/styles.css" type="text/css" />
        <?php
           session_set_cookie_params(1);
           session_start();
        ?>
    </head>

    <body>  
            <?php
            if(isset($_POST["nombreutilisateurs"])==False){
                echo
                "<div class=alignement_au_centre>
                    <form method='POST'>";
                echo"
                        De combien d'utilisateur avez-vous besoin ?"."
                        <input type='number' name='nombreutilisateurs' class='demande_nom_utilisateur' id='nombre_utilisateurs' min='1' max='40' placeholder='Nombre de participants' required></input>
                            </br>
                        <input type='submit' value='Valider' class='BoutonValidation' >
                    </form>
                </div>";
            }
            
            
            if (isset($_POST["nombreutilisateurs"])){
                $nombre_util= htmlspecialchars($_POST["nombreutilisateurs"]);
                echo '
                <div class=alignement_au_centre>
                    <form method="POST">';
                for($i=1;$i<=$nombre_util;$i++){
                    echo"
                        <input name='nom_utilisateur".$i."' placeholder='Nom utilisateur' class='alignement_input' required>

                        </br>
                    ";
                }
                echo"
                        <input type='submit' value='Valider' class='BoutonValidation' >
                </div>";
                
            }                
            ?>
    </div>

</html>
