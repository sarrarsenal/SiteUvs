<?php session_start();
//appel de la page connexion
include_once('connexion.php');
if(isset($_POST['EmailLogin'])){
    $login=htmlentities($_POST['EmailLogin']);
}
if(isset($_POST['PasswordLogin'])){
    $password=htmlentities($_POST['PasswordLogin']);
    $password=md5($password);
}
// variable de session
$_SESSION['EmailLogin']=$login;
$_SESSION['PasswordLogin']=$password;
// j ouvre la connexion a ma base de donnee
//$conn=new PDO('mysql:host=localhost, dbbname=tableau_de_bord_dcm', 'root', '') ;
$conn=connexpdo("tableau_de_bord_dcm","parametre");
$requete=$conn->query("Select * from agentsdcm where EmailAgent='$login' and Motdepasse='$password'");
$row=$requete->rowCount();
if($row==1){
    echo 'Vous etes à la page';
    //header('location:MontableaudeBord.php');
}
else
    echo "Vous avez pas encore de compte";
///////////////////////////////////////////////////////////////////////////////////////////////////////
?>