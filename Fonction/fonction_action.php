<?php

$host="localhost";
$user="root";
$pass ="";
$port="";
$DataBase="mitm";


$connexion = mysqli_connect($host,$user,$pass,$DataBase);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


function modif_id ($id1, $id2, $connexion){//Modifie un ID dans la table de relation ID étudiants

    $sql= "UPDATE `table` SET `id` = '$id2' WHERE `table`.`id` = '$id1'; ";
    
    if (mysqli_query($connexion, $sql)) {
        $idrep = $_COOKIE['id'];
        setcookie($idrep, $reponse, time()+3600*24);
        $idrep = $idrep + 1;
        setcookie('id', $idrep);
      } else {
        echo "Error updating record: " . mysqli_error($connexion);
      }
}

//modif_id(5555555555,1111111111,$connexion);


function block_id ($idtoblock, $tour_unblock, $connexion){//Bloque un ID sur un tour

    $sql= "UPDATE `table` SET `blocked` = true WHERE `table`.`id` = `$idtoblock` AND SET 'tour_unblock' = `$tour_unblock` WHERE `table`.`id` = `$idtoblock`; ";
    if (mysqli_query($connexion, $sql)) {
      $idrep = $_COOKIE['id'];
      setcookie($idrep, $reponse, time()+3600*24);
      $idrep = $idrep + 1;
      setcookie('id', $idrep);
      } else {
        echo "Error updating record: " . mysqli_error($connexion);
      }
}

//block_id(5555555555, 5, $connexion);


function ecoute_id ($idquiecoute, $idtoecoute, $tour_unblock, $connexion){//Bloque un ID sur un tour

  $sql= "INSERT INTO 'ecoute' ('UTILId1', 'UTILId2', 'PHASEId') VALUES ('$idquiecoute', '$idtoecoute', '$tour_unblock')";
  if (mysqli_query($connexion, $sql)) {
    $idrep = $_COOKIE['id'];
    setcookie($idrep, $reponse, time()+3600*24);
    $idrep = $idrep + 1;
    setcookie('id', $idrep);
    } else {
      echo "Error updating record: " . mysqli_error($connexion);
    }
}
?>