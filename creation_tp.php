

    
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
    <?php
        include('Fonction/connexion_sql.php');
        session_set_cookie_params(0);
        session_start();
    ?>

    <body>  
            <?php
                
            ?>
    </div>

</html>
