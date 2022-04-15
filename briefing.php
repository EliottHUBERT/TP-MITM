<?php
session_set_cookie_params(0);
session_start();
$idrep = 0;
setcookie('id', $idrep)
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <META HTTP-EQUIV="Refresh" CONTENT="; URL=/TP-MITM/eleve/interfaceEleve.php"> 
        <link href="styles/styles.css" rel="stylesheet" type="text/css">
        <title> Briefing MITM </title>
    </head>
    <body>
        <div class="briefing">
            <div class="Texte">
                <br>
                <p>Vous allez vous mettre dans la peau d’un hacker😏. Votre objectif, communiquer un message secret à votre contact dans le Darkweb. Attention, votre organisation est elle-même ciblé et vous devez également contre attaquer pour arriver à vos fins. Après tout, les données des autres organismes pourront toujours être revendu à big Daddy Langloy💰</p><br>
                <p id="Titre">Objectif du TP :</p> <p><ul><li>Obtenir le mot secret de votre binôme : +10 £angloy💰</li> <li> Mener une attaque MITM sur d’autres camarade afin d’être le seul à réussir.☠️</li><li> Récupérer le bon message secret d’autre camarade : +5 £angloy💰</li></ul></p>
                <p id="Titre">Phase de compréhension : </p> <p><ul><li> TP à mener impérativement en binôme.</li><li> Votre binôme ne peut-être sur le même îlot que vous.</li><li>Aucune communication entre les étudiants après la phase de compréhension.</li><li> Seulement 20 min sont dédié à la compréhension du TP. Après les phases normales commencent.</li><li> Toutes documentations, échanges, sources, demande d’aide du professeur, ordinateur portable ... est interdit durant les phases normales.</li><li> Chaque étudiant doit définir avec son binôme un login/pass qui sera accepté lors de leur communications.</li><li> Le TP fonctionne par phase. A chaque phase l’étudiants peut faire dans l’ordre qu’il veut: <ul> <li>Une action de communication : </li><li>Demander la table de relation des Etudiants/ID </li><li>Etablissement de la communication avec un ID </li><li>Identification via login / pass auprès d’un ID </li><li>Message secret auprès d’un ID </ul></li><li>Et une action malveillante : <ul><li>Demander à modifier un ID </li><li>Bloquer un ID sur une phase</li><li> Ecouter un ID </li></ul> <li>Toutes les actions sont traitées en FIFO (First in / First out). </li><li>Une fois toutes les actions passées, une nouvelle phase débute. </li></ul> </p>
                <p id="Titre">Phase finale:</p><p><ul><li> Envoyer un message à votre enseignant avec :</li><ul><li>Votre message Secret </li><li>Le nom de votre binôme </li><li>Le message secret de votre binôme (si vous l’avez😈) </li><li>Le ou les messages secrets obtenus (si vous en avez😈) </p>
                <br>
                <form action="connexion.php">
                    <p><input type=submit value="continuer"></p>
                </form><br>   
            </div>
        </div>
    </body>
</html>