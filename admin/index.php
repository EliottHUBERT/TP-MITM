<?php

include '../Fonction/fonction.php';
if (!verifip()){
    header('Location:../connexion.php');
}
require ('../Fonction/connexion_sql.php')


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Page admin</title>
    <link rel="stylesheet" href="../Styles/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

    <!-- jQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
    $.getScript("./main.js");
    });</script>
</head>
<body>
    <h1>Page admin </h1>
    <form method="post" action="./server.php">
        <h2>Remise à zéro :</h2>
        <input type="submit" class="button" name="del" value="del" />
        <h2>Phase suivante:</h2>
        <input type="submit" class="button" name="next" value="next" />
    </form>
    <?php
    $query="SELECT PHASEId FROM phase WHERE PHASEEtat='en cours'";
    $result=mysqli_query($connexion,$query);
    if($result){
        $row=mysqli_fetch_assoc($result);
        if (!isset($row)){
            header("Refresh:0");
        }
        $numPhase=$row['PHASEId'];
        echo "<p>phase en cours : ".$numPhase;
    }else{
    }
    ?>
    <h2>Information sur un éléve</h2>
    <form methode='get'>
        <span>Utilisateur</span>
        <select name="search" class="form-select" id="inputGroupSelect03">
            <?php
            $query="SELECT * FROM utilisateur";
            $result=mysqli_query($connexion,$query);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $name=$row['UTILLogin'];
                    $id=$row['UTILId'];
                    echo "<option value='".$id."'>".$name."</option>";
                }
            }
            ?>
        </select>
        <input type="submit" class="button" name="info" value="info"/> 
    </form>
    <div class="souspage">
        <div class="box">
            <?php
            if(isset($_GET['info'])){
                $id=$_GET['search'];
                $query="SELECT UTILLogin as nom FROM utilisateur
                        WHERE UTILId=$id OR UTILId=(SELECT UTILId2 FROM binome WHERE UTILId1 = $id)";
                $result=mysqli_query($connexion,$query);
                if (mysqli_num_rows($result)!=1){
                    $compte=0;
                    while($row=mysqli_fetch_assoc($result)){
                        $name=$row['nom'];
                        $compte+=1;
                        if ($compte==1){
                            echo "<p>Nom : ".$name."</p>";
                        }elseif ($compte==2) {
                            echo "<p>Binome avec : ".$name."</p>";
                        }
                    }
                }else{
                echo "Pas d'information disponible";
                }
            }
            ?>
            
            <table>
                
                    

            </table>
        </div>
    </div>
</body>
</html>
