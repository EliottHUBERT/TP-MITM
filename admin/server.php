<?php
require ('../Fonction/connexion_sql.php');

if(isset($_POST['del'])){
    // $query.="DELETE FROM binome;";
    // $query.="DELETE FROM utilisateur";
    // $query.="ALTER TABLE utilisateur AUTO_INCREMENT=0;";
    $query="DELETE FROM phase;";
    $query.="ALTER TABLE phase AUTO_INCREMENT=0;";
    $query.="INSERT INTO phase (PHASEId, PHASEEtat) VALUES (NULL, 'en cours');";
    $result = mysqli_multi_query($connexion, $query);
    if(!$result){
        printf("Errormessage: %s\n",$connexion -> error);
    }
    echo "del";
}

if(isset($_POST['next'])){
    echo "next";
    $query="UPDATE phase SET PHASEEtat = 'fini' WHERE PHASEId =(SELECT PHASEId ORDER BY PHASEId DESC LIMIT 1);";
    $query.="INSERT INTO phase (PHASEId, PHASEEtat) VALUES (NULL, 'en cours');";
    $result = mysqli_multi_query($connexion, $query);
    if(!$result){
        printf("Errormessage: %s\n",$connexion -> error);
    }
}
header('Location:./index.php')
?>