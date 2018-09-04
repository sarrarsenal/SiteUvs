<?php
session_start();
if(isset($_SESSION)) {
    $Numero_Dossier = htmlentities($_SESSION['NumeroDossier']);
    echo $Numero_Dossier;
}
?>