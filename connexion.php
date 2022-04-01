html>
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
        <form method='POST'>
        De combien d'utilisateur avez-vous besoin ?"."
                        <input type='number' name='nombreutilisateurs' class='demande_nom_utilisateur' id='nombre_utilisateurs' min='1' max='40' placeholder='Nombre de participants' required></input>
                            </br>
                        <input type='submit' value='Valider' class='BoutonValidation' >
                    </form>
    </body>