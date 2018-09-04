<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 16/05/2018
 * Time: 10:14
 */
/***********************************************************************
definition de la classe Inscription
 ***********************************************************************/


   class Inscription {

       private $_NomAgent;

       private $_PrenomAgent;

       private $_EmailAgent;

       private $_MotDePasseAgent;

       private $_FonctionAgent;

       public function __construct($NomAgent,$PrenomAgent,$EmailAgent,$MotDePasseAgent,$FonctionAgent){

           $this->setNomAgent($NomAgent);
           $this->setPrenomAgent($PrenomAgent);
           $this->setEmailAgent($EmailAgent);
           $this->setMotDePasseAgent($MotDePasseAgent);
           $this->setFonctionAgent($FonctionAgent);
       }

       public function setNomAgent($NomAgent){
           $this->_NomAgent=$NomAgent;
       }
       public function setPrenomAgent($PrenomAgent){
           $this->_PrenomAgent=$PrenomAgent;
       }

       public function setEmailAgent($EmailAgent){
           $this->_EmailAgent=$EmailAgent;
       }

       public function setMotDePasseAgent($MotDePasseAgent){
           $this->_MotDePasseAgent=$MotDePasseAgent;
       }

       public function setFonctionAgent($FonctionAgent){
           $this->_FonctionAgent=$FonctionAgent;
       }

       public function ajouterInscription($conn){
           // date GMT en cours
           $requette=$conn->query("SELECT CURRENT_DATE()");
           $resultat=$requette->fetch(PDO::FETCH_NUM);
           $date=$resultat[0];
           ////attributs de l'inscription
           $NomAgent=$this->_NomAgent;
           $PrenomAgent=$this->_PrenomAgent;
           $EmailAgent=$this->_EmailAgent;
           $MotDePasseAgent=$this->_MotDePasseAgent;
           $FonctionAgent=$this->_FonctionAgent;

           $conn->exec("insert into agentsdcm(Prenom,Nom,EmailAgent,Motdepasse,Fonction,EtatCompte,Profil) values ('$PrenomAgent ','$NomAgent','$EmailAgent','$MotDePasseAgent','$FonctionAgent',1,'utilisateur')");
           return $conn->lastInsertId();
       }
   }
?>
