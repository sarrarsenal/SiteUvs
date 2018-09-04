<?php
error_reporting(1);
//appel de la page connexion
include_once('connexion.php');
//appel de la page ajouter activite
include_once('AjouterActivite.php');
//$etat="en cours";

if(isset($_POST['NomDossierActivite'])){
    $NomdossierActivite= htmlentities($_POST['NomDossierActivite']); // je recupére le numéro dossier ici
}

if(isset($_POST['NomActivite'])){
    $NomActivite= htmlentities($_POST['NomActivite']); // je recupére le nom de l'activité
}

if(isset($_POST['auteur'])) {
    $Auteur = htmlentities($_POST['auteur']); // je recupére l'auteur

}
if(isset($_POST['Dateprevisionnelle'])){
    $Dateprevisionnelle= htmlentities($_POST['Dateprevisionnelle']);// je recupére la date prévisionnelle
}

if(isset($_POST['Datexecution'])){
    $Datexecution= htmlentities($_POST['Datexecution']); // je recupere la date d'execution
}

if(isset($_POST['Remarques'])){
    $Remarques= htmlentities($_POST['Remarques']); // je recupere les remarques
}

if(isset($_POST['Livrable'])){
    $Livrable= htmlentities($_POST['Livrable']); // je recupere les  livrables
}

$conn=connexpdo("tableau_de_bord_dcm","parametre");
$AjoutActivite=new AjouterActivite($NomdossierActivite, $NomActivite,$Auteur,$Dateprevisionnelle,$Datexecution,$Remarques,$Livrable);
$IdActivite=$AjoutActivite->ajouterActivite($conn);
if($IdActivite){
    echo "Activite ajoutee";
}
else {
    echo "Activite non ajoutee";
}
?>
