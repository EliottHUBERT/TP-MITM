<?php
$con = mysqli_connect('localhost','root','','mitm');

function afficherTableId(){
    if($con){  
        $requete = "SELECT * 
        FROM utilisateur;";
        
        $result = mysqli_query($con, $requete);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $idEleve = $row["idEleve"];
            echo $idEleve."<br>";
        }
    }
}

function test($test) {
    echo $test;
}



?>