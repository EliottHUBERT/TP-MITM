<?php

function idEleve($id){
    $con = mysqli_connect('localhost','root','','mitm');
    if($con){  
        $requete = "SELECT * 
        FROM utilisateur
        WHERE id = $id;";
        
        $result = mysqli_query($con, $requete);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $idEleve = $row["idEleve"];
            return $idEleve;
        }
    }
}

function loginEleve($id){
    $con = mysqli_connect('localhost','root','','mitm');
    if($con){  
        $requete = "SELECT *
        FROM utilisateur
        WHERE id = $id;";
        
        $result = mysqli_query($con, $requete);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $login = $row["login"];
            return $login;
        }
    }
}


function verifip(){
    $ip=$_SERVER['REMOTE_ADDR'];
    $ipserveur=$_SERVER['SERVER_ADDR'];
    if ($ip==$ipserveur){
        return TRUE;
    }
}

?>