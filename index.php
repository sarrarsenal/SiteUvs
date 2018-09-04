
<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>Page de connexion et d'inscription du tableau de Bord de DCM</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/stylenew.css">
</head>
<body>
  <div class="form">
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Inscription</a></li>
        <li class="tab"><a href="#login">Connexion</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1 class="blanc">Inscription</h1>
            <div class="success_register">
                <span>Incription reussie !</span>
            </div>
          <form action="controllers/PageInscription.php" method="post" id="form">

          <div class="top-row">
            <div class="field-wrap">
              <label>
Prénom<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="PrenomAgent" id="PrenomAgent" />
            </div>

            <div class="field-wrap">
              <label>
Nom<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="NomAgent" id="NomAgent"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
Adresse E-mail<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="EmailAgent" id="EmailAgent"/>
          </div>
          <div class="field-wrap">
            <label>
Mot de passe<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="PasswordAgent" id="PasswordAgent"/>
          </div>
            <div class="field-wrap">
              <select name="FonctionAgent" id="fonction">
                <option value="Chef de Division communication interne et événementiel">Chef de Division communication interne et événementiel</option>
                <option value="Chef de Division Marketing et Communication Externe (Institutionnelle et Digitale)">Chef de Division Marketing et Communication Externe (Institutionnelle et Digitale)</option>
                <option value="Chargée de Communication ">Chargée de Communication </option>
                <option value="Chargé de communication, Presse, Médias Online-Offline">Chargé de communication, Presse, Médias Online-Offline</option>
                <option value="Chargée de la communication interne">Chargée de la communication interne</option>
                <option value="Chargée de suivi et de coordination">Chargée de suivi et de coordination</option>
                <option value="Community manager">Community manager</option>
                <option value="Infographiste">Infographiste</option>
                <option value="Webmaster">Webmaster</option>
                  <option value="Assistant(e)">Assistant(e)</option>
              </select>
            </div>
          <button type="submit" class="button button-block" id="enregistrer"/>Enregistrer</button>
          </form>
        </div>
        <div id="login">
          <h1 class="blanc">Connexion</h1>
            <div class="success_login">
                <span>Connexion reussie !</span>
                <i class="close fa fa-close"></i>
            </div>
            <div class="erroremail">
                <span>Login ou mot de passe érroné!</span>
                <i class="close fa fa-close"></i>
            </div>
          <form action="controllers/LoginAgent.php" method="post" id="formlogin">
            <div class="field-wrap">
            <label>
Adresse E-mail<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" id="EmailLogin" name="EmailLogin"/>
          </div>

          <div class="field-wrap">
            <label>
Mot de Passe<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" id="PasswordLogin" name="PasswordLogin"/>
          </div>
          <p class="forgot"><a href="#">Mot de passe oublié?</a></p>
          <button class="button button-block" id="seconnecter"/>Se connecter</button>
          </form>
        </div>
      </div><!-- tab-content -->
</div> <!-- /form -->
  <script src='js/jquery.js'></script>
  <script  src="js/index.js"></script>
  <script src="js/jquery-1.8.0.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('#enregistrer').click(function(e){
              e.preventDefault();
              var error = false;
              if(error == false){
                  $.post("controllers/PageInscription.php",
                      $("#form").serialize(),function(result){
                          //alert(result);
                          if(result=="inscris"){
                              $('#form').get(0).reset(); //Fonctionne
                              $('.success_register').fadeIn('slow',function(){
                              });
                          }else if(result=="non inscris"){
                              //$('.erroremail').fadeIn(1000);
                              $('.success_register').fadeOut(1000);
                              $('#NomAgent').val("");
                              $('#PrenomAgent').val("");
                              $('#EmailAgent').val("");
                              $('#PasswordAgent').val("");
                          }
                      });
              }
          });
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function(){
          $('#seconnecter').click(function(e){
              e.preventDefault();
              var error = false;
              if(error == false){
                  $.post("controllers/LoginAgent.php",
                      $("#formlogin").serialize(),function(result){
                          if(result=="Vous etes à la page"){
                              $('#formlogin').get(0).reset(); //Fonctionne
                              document.location.href="MontableaudeBord.php";
                              $('.success_login').fadeIn('slow',function(){
                              });
                          }else if(result=="Vous avez pas encore de compte"){
                              $('.erroremail').fadeIn(1000);
                          }
                      });
              }
          });
      });
  </script>
</body>
</html>
