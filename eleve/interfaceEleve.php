<?php
include ('../fonction.php');
?>
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
    <?php
        echo idEleve(1);
        echo loginEleve(1);
    ?>

</html>