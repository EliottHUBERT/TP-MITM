<html>
    <head>
        <meta charset="utf-8">
        <title>MITM Fin</title>
        <link rel="stylesheet" href="Styles/styles.css" type="text/css" />
        <?php
            include('Fonction/connexion_sql.php');
            session_set_cookie_params(0);
            session_start();

            foreach($_COOKIE as $cookie_name => $cookie_value){
                    
                // Commence par supprimer la valeur du cookie
                unset($_COOKIE[$cookie_name]);
                
                // Puis désactive le cookie en lui fixant 
                // une date d'expiration dans le passé
                setcookie($cookie_name, '', time() - 4200, '/');
            }
        ?>
    </head>
    <body>
        <div class='fin'>Merci d'avoir participé au TP Man In The Middle</div>
    </body>

    