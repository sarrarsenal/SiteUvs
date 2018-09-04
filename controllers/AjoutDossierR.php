<?php
//appel de la page connexion
include_once('connexion.php');
//appel de la page inscription
include_once('AjouterDossier.php');
$etat="en cours";

if(isset($_POST['Nomdossier'])){
    $Nomdossier= htmlentities($_POST['Nomdossier']);
}

if(isset($_POST['Responsbaledossier'])){
    $Responsbaledossier= htmlentities($_POST['Responsbaledossier']);
}

if(isset($_POST['Datedebut'])){
    $Datedebut= htmlentities($_POST['Datedebut']);
}

if(isset($_POST['Echeance'])){
    $Echeance= htmlentities($_POST['Echeance']);
}

if(isset($_POST['Action'])){
    $Action= htmlentities($_POST['Action']);
}


$conn=connexpdo("tableau_de_bord_dcm","parametre");
$AjoutDossier=new AjouterDossier($Nomdossier,$Responsbaledossier,$Datedebut,$Echeance,$Action);
$IdDossier=$AjoutDossier->ajouterDossier($conn);
if($IdDossier){
    echo "Dossier ajoute";
}
else {
    echo "Dossier non ajoute";
}
?>
