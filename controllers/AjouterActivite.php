<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 16/05/2018
 * Time: 10:14
 */
/***********************************************************************
definition de la classe ajouter activiter
 ***********************************************************************/


class AjouterActivite {


    private $_Numerodossier;

    private $_NomActivite;

    private $_Auteur;

    private $_DatePrevisionnelle;

    private $_DateExecution;

    private $_Remarques;

    private $_Livrable;


    public function __construct($Numerodossier,$NomActivite,$Auteur,$DatePrevisionnelle,$DateExecution,$Remarques,$Livrable){

        $this->setNumeroDossier($Numerodossier);
        $this->setNomActivite($NomActivite);
        $this->setAuteur($Auteur);
        $this->setDatePrevisionnelle($DatePrevisionnelle);
        $this->setDateExecution($DateExecution);
        $this->setRemarques($Remarques);
        $this->setLivrable($Livrable);
    }

    public function setNumerodossier($Numerodossier){
        $this->_Numerodossier=$Numerodossier;
    }
    public function setNomActivite($NomActivite){
        $this->_NomActivite=$NomActivite;
    }
    public function setAuteur($Auteur){
        $this->_Auteur=$Auteur;
    }

    public function setDatePrevisionnelle($DatePrevisionnelle){
        $this->_DatePrevisionnelle=$DatePrevisionnelle;
    }

    public function setDateExecution($DateExecution){
        $this->_DateExecution=$DateExecution;
    }

    public function setRemarques($Remarques){
    $this->_Remarques=$Remarques;
   }

    public function setLivrable($Livrable){
        $this->_Livrable=$Livrable;
    }
    public function ajouterActivite($conn){
        $NumeroDossier=$this->_Numerodossier;
        $NomActivite=$this->_NomActivite;
        $Auteur=$this->_Auteur;
        $DatePrevisionnelle=$this->_DatePrevisionnelle;
        $DateExecution=$this->_DateExecution;
        $Remarques=$this->_Remarques;
        $Livrable=$this->_Livrable;


        $conn->exec("insert into actions (Numero_Dossier,Nom_Action,Acteurs,Date_Prévisionnelle,Date_Execution,Remarques,Livrable) values ('$NumeroDossier','$NomActivite','$Auteur','$DatePrevisionnelle','$DateExecution','$Remarques','$Livrable')");
        return $conn->lastInsertId();
    }
}
?>
