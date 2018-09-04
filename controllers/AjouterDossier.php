<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 16/05/2018
 * Time: 10:14
 */
/***********************************************************************
definition de la classe ajouter dossier
 ***********************************************************************/


class AjouterDossier {

    private $_NomDossier;

    private $_NomResponsable;

    private $_DateDebut;

    private $_Echeance;

    private $_Actions;


    public function __construct($NomDossier,$NomResponsable,$DateDebut,$Echeance,$Actions){

        $this->setNomDossier($NomDossier);
        $this->setNomResponsable($NomResponsable);
        $this->setDateDebut($DateDebut);
        $this->setEcheance($Echeance);
        $this->setActions($Actions);
    }

    public function setNomDossier($NomDossier){
        $this->_NomDossier=$NomDossier;
    }
    public function setNomResponsable($NomResponsable){
        $this->_NomResponsable=$NomResponsable;
    }

    public function setDateDebut($DateDebut){
        $this->_DateDebut=$DateDebut;
    }

    public function setEcheance($Echeance){
        $this->_Echeance=$Echeance;
    }

    public function setActions($Actions){
        $this->_Actions=$Actions;
    }

    public function ajouterDossier($conn){
        $NomDossier=$this->_NomDossier;
        $NomResponsable=$this->_NomResponsable;
        $DateDebut=$this->_DateDebut;
        $Echeance=$this->_Echeance;
        $Actions=$this->_Actions;

        $conn->exec("insert into Dossiers (NomDossier,ResponsableDossier,DateDebut,Echeance,Observations) values ('$NomDossier','$NomResponsable','$DateDebut','$Echeance','$Actions')");
        return $conn->lastInsertId();
    }
}
?>
