<?php
session_start();
if(isset($_SESSION)) {
    $NomUtilisateur = htmlentities($_SESSION['EmailLogin']);
    $MotdePasse = htmlentities($_SESSION['PasswordLogin']);
    $Numero_dossier_recu= htmlentities($_SESSION['id']);
    echo $Numero_Dossier_recu;
    include('controllers/connexion.php');
    $conn = connexpdo("tableau_de_bord_dcm", "parametre");
    $requette = $conn->query("Select * from agentsdcm where EmailAgent='$NomUtilisateur' and Motdepasse='$MotdePasse' ");
    $ligne = $requette->rowCount();
    $data = $requette->fetch(PDO::FETCH_ASSOC);
    $Prenom = $data['Prenom'];
    $Nom = $data['Nom'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tableau de Bord DCM | UVS</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" style="background-color:#243a51;">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg " id="mainNav" style="border-bottom:3px solid #17a2b8; margin-top:-40px">
    <a class="navbar-brand" href="#">DCM</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="background-color:#243a51; color:#ffffff ; border-right: 3px solid #17a2b8">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Tableau de Bord</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion" style="border-bottom: 1px solid #17a2b8" >
                    <i class="fa fa-folder" style="color:#33b5e5"></i>
                    <span class="nav-link-text" style="color:#ffffff">  Dossiers</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents" style="background-color: #FFFFFF; color:#000000">
                    <li id="ajouterdossier">
                        <a href="#"> <i class="fa fa-plus" style="color:#28a745" ></i> Ajouter dossier</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pencil" style="color:#ffc107"></i> Modifier Dossier</a>
                    </li>
                    <li id="ListeDossier">
                        <a href="#"><i class="fa fa-remove" style="color:#dc3545"></i> Supprimer Dossier</a>

                        <a href="#"><i class="fa fa-list" style=" color: #17a2b8"></i> Lister les  dossiers</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion"  style="border-bottom: 1px solid #17a2b8">
                    <i class="fa fa-tasks" style="color:#33b5e5"></i>
                    <span class="nav-link-text" style="color:#ffffff">  Activités</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages" style="background-color: #FFFFFF; color:#000000">
                    <li id="ajouteractivite">
                        <a href="#"> <i class="fa fa-plus" style="color:#28a745" ></i> Ajouter activité</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pencil" style="color:#ffc107"></i> Modifier activité</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-remove" style="color:#dc3545"></i> Supprimer activité</a>
                    </li>

                    <li>
                        <a href="#" id ="listeractivite"><i class="fa fa-list" style="color:#17a2b8"></i> Lister les activités</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion"  style="border-bottom: 1px solid #17a2b8">
                    <i class="fa fa-user" style="color:#33b5e5"></i>
                    <span class="nav-link-text" style="color:#ffffff">  Responsable dossier</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti" style="background-color: #FFFFFF; color:#000000">
                    <li>
                        <a href="#"><i class="fa fa-plus" style="color:#28a745" ></i> Ajouter responsable</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pencil" style="color:#ffc107"></i> Modifier responsable</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-remove" style="color:#dc3545"></i>Supprimer responsable</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-link"></i>
                    <span class="nav-link-text">Link</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler" style="background-color: #33b5e5;color:#ffffff">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler" style="border:3px solid #17a2b8">
                    <i class="fa fa-fw fa-angle-left" style="color:#ffffff"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
                    <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">New Messages:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>David Miller</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>Jane Smith</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>John Doe</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all messages</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
                    <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">New Alerts:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a>
                </div>
            </li>
            <li class="nav-item" style="color:#ffffff">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    Bienvenue  <?php echo $Prenom ;
                    ?> <?php echo $Nom; ?> <i class="fa fa-fw fa-sign-out"></i> Deconnexion</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Tableau de Bord</a>
            </li>
            <li class="breadcrumb-item active">Mon tableau de Bord DCM</li>
        </ol>

        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-folder"></i>
                        </div>
                        <div class="mr-6">Dossiers en cours</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Voir détails</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-folder"></i>
                        </div>
                        <div class="mr-5">Dossiers terminés</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Voir détails</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-4">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-folder"></i>
                        </div>
                        <div class="mr-5">Dossiers en retard</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Voir détails</span>
                        <span class="float-right">
                      <i class="fa fa-angle-right"></i>
                     </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row card-header" style="background-color: #f5f5f5;color:#000000; display:none" id="topajouterdossier"><i class="fa fa-folder" style="color:#000000;font-size:30px;margin-right: 20px"></i>
                Ajouter dossier</div>
            <div class="row">
                <div class="success_register">
                    <span class="success_register">Dossier ajouté dans notre base de données !</span>
                </div>
            </div>
            <div class="card-body" id="ajouderdossierbody" style="display:none">
                <form method="post" id="formdosssier" action="controllers/AjoutDossierR.php">
                    <div class="row">
                        <div class="col-6">
                            <label for="Nom dossier">Nom dossier :</label>
                            <input class="form-control" id="Nomdossier" type="text" name="Nomdossier">
                        </div>
                        <div class="col-6">
                            <label for="Responsable">Responsable :</label>
                            <input class="form-control" id="Responsbaledossier" type="text" name="Responsbaledossier">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="Date debut">Date début :</label>
                            <input class="form-control" id="Datedebut" type="date" name="Datedebut">
                        </div>
                        <div class="col-6">
                            <label for="Echeance">Echeance :</label>
                            <input class="form-control" id="Echeance" type="date" name="Echeance">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="Actions">Observations(s) :</label>
                            <textarea class="form-control" id="Action" type="text" name="Action"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <span class="align-content-lg-center" style="text-align: center; margin-left:520px;"></span> <input class="btn btn-primary" type="submit" value="Enregistrer" id="enregistrerdossier" style="margin-top:40px;"></form>
            </div>
            </form>
        </div>
    </div>

    <!-- fin bloc formulaire ajout dossier -->

    <!-- fin bloc formulaire ajout activité -->
    <div class="col-sm-12">
        <div class="row card-header" style="background-color: #ffffff;color:#000; background-color: #F5F5F5; display:none;" id="topajouteractivite"> <i class="fa fa-tasks" style="color:#000000;font-size:30px;margin-right: 20px"></i>
            Ajouter Activité
        </div>
        <div class="card-body" id="ajouderactivitebody" style="display:none;">
            <form method="post" id="formactivite" action="controllers/AjoutActiviteR.php">
                <div class="col-sm-12">
                    <div class="success_register_activite">
                        <span class="success_register_activite">Activité ajoutée dans notre base de données !</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="Nom Activite">Choisir un dossier :</label>
                        <select name="NomDossierActivite" class="form-control">
                            <?php
                            $requette = $conn->query("Select * from dossiers");// lancement de la requette
                            //$infoAgent = $requette->rowCount();
                            while($donnees_doss = $requette->fetch(PDO::FETCH_ASSOC)){
                                // je recupére l'id du dossier
                                $Nom_doss = $donnees_doss['NomDossier'];
                                $Num_doss = $donnees_doss['Numero_Dossier'];

                                ?>
                                <option value ="<?php echo $Num_doss ?>"><?php echo $Nom_doss; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="Nom Activite">Nom Activité :</label>
                        <input class="form-control" id="NomActivite" type="text" name="NomActivite">
                    </div>
                    <div class="col-6">
                        <label for="Responsable">Auteur:</label>
                        <select name="auteur" class="form-control"">
                        <option value ="Alpha">Alpha</option>
                        <option value ="Awa">Awa</option>
                        <option value ="Bachir">Bachir</option>
                        <option value ="Cheikh">Cheikh</option>
                        <option value ="Coura">Coura</option>
                        <option value ="Garmy">Garmy</option>
                        <option value ="Khadidiatou">Khadidiatou</option>
                        <option value ="Mohamed">Mohamed</option>
                        <option value ="Ouleymatou">Ouleymatou</option>
                        <option value ="Salimata">Salimata</option>
                        <option value ="Tidiane">Tidiane</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="Date previsionnelle">Date Prévisionnelle :</label>
                        <input class="form-control" id="Dateprevisionnelle" type="date" name="Dateprevisionnelle">
                    </div>
                    <div class="col-6">
                        <label for="Date exécution">Date exécution :</label>
                        <input class="form-control" id="Datexecution" type="date" name="Datexecution">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="Remarques">Remarques :</label>
                        <textarea class="form-control" id="Remarques" type="text" name="Remarques"></textarea>
                    </div>
                    <div class="col-6">
                        <label for="Livrable">Livrable :</label>
                        <input class="form-control" id="Livrable" type="text" name="Livrable">
                    </div>
                </div>
                <div class="row">
                    <span class="align-content-lg-center" style="text-align: center; margin-left:520px;"></span> <input class="btn btn-primary" type="submit" value="Enregistrer" id="enregistreractivite" style="margin-top:40px;">
                </div>
            </form>
        </div>
    </div>


    <!-- debut liste des dossier en cours -->
    <div class="row">
        <!-- tableau liste des agents de la DCM-->
        <div class="col-sm-12">
            <div class="card-header" style="background-color: #28a745;color:#ffffff; display:none" id="TopListeDossier">
                <i class="fa fa-liste" style="color:#ffffff;font-size:30px;margin-right:20px"></i>La liste des dossiers</div>
            <div class="card-body" id="ListeDossierBody" style="display:none">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Intitulé dossier</th>
                            <th>Responsable</th>
                            <th>Date début</th>
                            <th>Echéance</th>
                            <th>Observations</th>
                            <th>Détails</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $requette = $conn->query("Select * from dossiers");// lancement de la requette
                            //$infoAgent = $requette->rowCount();
                            while($donnees_dossiers = $requette->fetch(PDO::FETCH_ASSOC)){
                            // je recupére l'id du dossier
                            $Numero_Dossier = $Observations=$donnees_dossiers['Numero_Dossier'];
                            ?>
                            <td><?php echo $IntituleDossier = $donnees_dossiers['NomDossier']; ?></td>
                            <td><?php echo $NomResponsable = $donnees_dossiers['ResponsableDossier'];  ?></td>
                            <td><?php echo $DateDebut=$donnees_dossiers['DateDebut']; ?></td>
                            <td><?php echo $Echeances=$donnees_dossiers['Echeance']; ?></td>
                            <td><?php echo $Observations=$donnees_dossiers['Observations']; ?></td>
                            <form method="post" action="Controllers/Listeactivites.php">
                                <input type="hidden" name="NumeroDossier" value="<?php echo $Numero_Dossier; ?>">
                                <td><a href="http://127.0.0.1/DCM%20dashbord/ListeActions.php?id= <?php echo $Numero_Dossier;?>"> <i class="fa fa-plus" style="color: #28a745; margin-left:26px" ></a></td>
                            </form>
                        </tr>
                        <?php }// fin tableau ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- fin liste dossier en cours -->

    <!-- debut liste actions -->
    <div class="row">

        <div class="col-sm-12">
            <div class="card-header" style="background-color: #28a745;color:#ffffff; display:none" id="TopListeDossier">
                <i class="fa fa-liste" style="color:#ffffff;font-size:30px;margin-right:20px"></i>La liste des activités</div>
            <div class="card-body" id="ListeActiviteBody" style="display:none">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Intitulé dossier</th>
                            <th>Responsable</th>
                            <th>Date début</th>
                            <th>Echéance</th>
                            <th>Observations</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $Sql_Activite = $conn->query("SELECT  'NomDossier','Nom_Action','Acteurs','Date_Prévisionnelle','Date_Execution','Livrable' FROM actions, dossiers WHERE actions.Numero_Dossier=dossiers.Numero_Dossier and 
actions.Numero_Dossier=$Numero_dossier_recu;");// lancement de la requette
                            //$infoAgent = $requette->rowCount();
                            while($donnees_Activites = $Sql_Activite->fetch(PDO::FETCH_ASSOC)){
                            // je recupére l'id du dossier
                            $Numero_Dossier = $Observations=$donnees_Activites['Numero_Dossier'];
                            ?>
                            <td><?php echo $IntituleDossier = $donnees_Activites['NomDossier']; ?></td>
                            <td><?php echo $NomResponsable = $donnees_Activites['ResponsableDossier'];  ?></td>
                            <td><?php echo $DateDebut=$donnees_Activites['DateDebut']; ?></td>
                            <td><?php echo $Echeances=$donnees_Activites['Echeance']; ?></td>
                            <td><?php echo $Observations=$donnees_Activites['Observations']; ?></td>
                        </tr>
                        <?php }// fin tableau ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- fin liste actions -->






    <div class="row">
        <!-- tableau liste des agents de la DCM-->
        <div class="col-sm-12">
            <div class="card-header" style="background-color: #28a745;color:#ffffff" id="TopListeAgent">
                <i class="fa fa-user" style="color:#ffffff;font-size:30px;margin-right:20px"></i>Les agents de la DCM</div>
            <div class="card-body" id="BodyListAgent">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTableListeAgent" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Fonction</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $requette = $conn->query("Select * from agentsdcm");// lancement de la requette
                            //$infoAgent = $requette->rowCount();
                            while($donnees = $requette->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <td><?php echo  $PrenomAgent = $donnees['Prenom']; ?></td>
                            <td><?php echo $NomAgent = $donnees['Nom'];  ?></td>
                            <td><?php echo $EmailAgent=$donnees['EmailAgent']; ?></td>
                            <td><?php echo $FonctionAgent=$donnees['Fonction']; ?></td>
                        </tr>
                        <?php }// fin tableau ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- fin tableau des agents de la DCM-->


    <footer class="sticky-footer" style="color:#ffffff; background-color: #243a51">
        <div class="container">
            <div class="text-center">
                <small>Copyright Direction Communication et Marketing - UVS </small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à quitter?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à terminer votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="logout.php" >Déconnecter</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/jquery-1.8.0.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
</div>

<script type="text/javascript">
    $('#enregistreractivite').click(function(e){
        e.preventDefault();
        var error = false;
        if(error == false){
            $.post("controllers/AjoutActiviteR.php",
                $("#formactivite").serialize(),function(result){
                    alert(result);
                    if(result=="Activite ajoutee"){
                        $('#formactivite').get(0).reset(); //Fonctionne
                        $(".success_register_activite").show().delay(2000).fadeOut();
                        //$('.success_register_activite').fadeIn('slow',function(){
                        //});
                    }
                    else if(result=="Activite non ajoutee"){ // si le reultat nest pas le bon
                    }
                });
        }
    });
</script>
<!-- fin bloc js ajouter activite -->
<!-- bloc js ajouter dossier -->

<script>
    $( document ).ready(function() {
        // console.log( "ready!" );
        $('.success_register').hide();
        $('.alert alert-success').hide();
        $('.success_register_activite').hide();
    });
</script>

<script>
    $(function(){
        $('#ajouteractivite').click(function(){
            $('#topajouteractivite').toggle();
            $('#ajouderactivitebody') .toggle();
            $('#topajouterdossier').hide();
            $('#ajouderdossierbody') .hide();
            $('#TopListeDossier').hide(); // je cache la barre haute de la table liste dossier
            $('#ListeDossierBody').hide(); // je cache la table liste dossiers
            $('#TopListeAgent').hide(); // cacher top de la table agent
            $('#BodyListAgent').hide(); // cacher body de la table agent
        });
    });
</script>


<script>
    $(function(){
        $('#ajouterdossier').click(function(){
            $('#topajouterdossier').toggle();
            $('#ajouderdossierbody') .toggle();
            $('#TopListeDossier').hide(); // je cache la barre haute de la table liste dossier
            $('#ListeDossierBody').hide(); // je cache la table liste dossiers
            $('#TopListeAgent').hide(); // cacher top de la table agent
            $('#BodyListAgent').hide(); // cacher body de la table agent
            $('#topajouteractivite').hide();
            $('#ajouderactivitebody') .hide();
        });
    });
</script>

<script>
    $(function(){
        $('#ListeDossier').click(function(){
            $('#topajouterdossier').hide();
            $('#ajouderdossierbody') .hide();
            $('.success_register').hide();
            $('.alert alert-success').hide(); // cacher le div success
            $('#TopListeAgent').hide(); // cacher top de la table agent
            $('#BodyListAgent').hide(); // cacher body de la table agent
            $('#TopListeDossier').toggle(); // je cache la barre haute de la table liste dossier
            $('#ListeDossierBody').toggle(); // je cache la table liste dossiers
            $('#topajouteractivite').hide(); // cacher bloc haut ajout activite
            $('#ajouderactivitebody') .hide(); // cacher body ajout activite
        });
    });
</script>

<script type="text/javascript">
    $('#enregistrerdossier').click(function(e){
        e.preventDefault();
        var error = false;
        if(error == false){
            $.post("controllers/AjoutDossierR.php",
                $("#formdosssier").serialize(),function(result){
                    //alert(result);
                    if(result=="Dossier ajoute"){
                        $('#formdosssier').get(0).reset(); //Fonctionne
                        $(".success_register").show().delay(2000).fadeOut();
                    }else if(result=="Dossier non ajoute"){
                    }
                });
        }
    });

</script>
</body>
</html>
