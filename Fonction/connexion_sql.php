<?php


function connexion_sql(){
    $connexion = mysqli_connect("localhost","root","","mitm");
        if ($connexion) { 
            echo 'Connexion au serveur réussie';
            $BDD = mysqli_select_db($connexion,'formulaires');
            if ($BDD) 
                echo 'Base de données sélectionnée';
            else 
                echo 'Echec de la sélection de la base'; 
                } 
        else 
            echo 'Erreur lors de la connexion';
}

?>