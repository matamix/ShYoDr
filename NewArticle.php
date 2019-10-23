<?php
// on se connecte à notre base
include_once ('function.php');
mysqli_query($db,"SET NAMES 'UTF8'");
openDB();
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
$listDefi = mysqli_query($db, "SELECT * FROM assoc_user_defi");

$loginUtilisateur = $_SESSION['user']['NNI']; 
$nomUtilisateur = $_SESSION['user']['nom'];
$prenomUtilisateur = $_SESSION['user']['prenom'];
$retour = mysql_query("SELECT * FROM utilisateur ORDER BY id");
$donnees = mysql_fetch_array($retour);

If (isset($_GET['id'])){
$variable = $_GET['id'];
$variable2 = str_replace("'", "", $variable);
}

$retourLibelle = mysqli_query($db,"SELECT * FROM assos_secteur");
?>
<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">
  <head>
    <title>Share Your Dreams</title>
    <?php linkHead(); ?>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
        <main>
      <div class="page-loader">
        <div class="loader">Chargement...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color: #509e2f">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php" style="color: #fff">Share Your Dreams</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="Toggle"><a class="Toggle" href="banque.php"> Banque <span class="icon-layers"></a>             
              </li>
              <?php if (isAdmin()){
                print('<li class="Toggle"><a class="Toggle" href="NewArticle.php"> Partager Articles <span class="icon-upload"></a>             
              </li>');
                print('<li class="Toggle"><a class="Toggle" href="sql/deconnexion.php"> Se Déconnecter</a>             
              </li>');
              }
              ?>
          </div>
        </div>
      </nav>
      <div class="main showcase-page">
        <section class="module-medium" id="demos">
          <div class="container">
            <div class="row">
              <h1 class="module-title font-alt">Nouvel Article <span class="icon-newspaper"></span></h1>
              <div class="col-sm-8 col-sm-offset-2">
                <h4 class="font-alt mb-0">Créer un Article :</h4>
                <hr class="divider-w mt-10 mb-20">
            </div>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
              <form class="form" role="form" action="sql/nouvelArticle.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <h4> <u> Choix du Continent</u> :</h4>
                  <select name="idSecteur">
                    <option value="1">Afrique</option>
                    <option value="2">Asie</option>
                    <option value="3">Amérique</option>
                    <option value="4">Europe</option>
                  </select>
                </div>
                  <div class="form-group">
                    <h4> <u>Titre de l'Article</u> : </h4>
                   <input class="form-control input-lg" type="text" name="titre" />
                  </div>

                  <div class="form-group">
                    <h4> <u>Paragraphe</u> : </h4>
                    <textarea class="form-control" rows="7" name="twitter"></textarea>
                  </div>

                  <div class="form-group">
                    <h4> <u>Image de couverture</u> : </h4>
                    <input type="hidden" name="MAX_FILE_SIZE" value="12345" />
                    <input type="file" name="icone">
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                    <button class="btn btn-g btn-round" type="submit" id="submit"><i class="icon-rss"></i>Partager sur Share Your Dreams</button>
                  </div>
                </div>
              </form>
              </div>
              </div>
        </section>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <?php scriptJS(); ?>
  </body>
</html>