<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 16/05/2018
 * Time: 10:36
 */
//appel de la page connexion
include_once('connexion.php');
//appel de la page inscription
include_once('inscription.php');
$cle=0;
$profil="Utilisateur";
// recuperation du nom de l'agent
if(isset($_POST['NomAgent'])){
    $NomAgent= htmlentities($_POST['NomAgent']);
}
// recuperation du prenom agent
if(isset($_POST['PrenomAgent'])){
    $PrenomAgent= htmlentities($_POST['PrenomAgent']);
}
// recuperation de email de l'agent
if(isset($_POST['EmailAgent'])){
    $EmailAgent= htmlentities($_POST['EmailAgent']);
}
// recuperation de password de l'agent
if(isset($_POST['PasswordAgent'])){
    $PasswordAgent= md5($_POST['PasswordAgent']);
}
// recuperation de la fonction de l'agent
if(isset($_POST['FonctionAgent'])){
    $FonctionAgent= htmlentities($_POST['FonctionAgent']);
}
$conn=connexpdo("tableau_de_bord_dcm","parametre");
    $inscription=new Inscription($NomAgent,$PrenomAgent,$EmailAgent,$PasswordAgent,$FonctionAgent,$cle, $profil);
    $IdAgent=$inscription->ajouterInscription($conn);
if($IdAgent){
echo "inscris";
}
else {
    echo "non inscris";
}
?>
