<?php
// on se connecte à notre base
include_once ('function.php');
mysqli_query($db,"SET NAMES 'UTF8'");
openDB();

$listDefi = mysqli_query($db, "SELECT * FROM assoc_user_defi");

if (isAdmin()) {
$loginUtilisateur = $_SESSION['user']['NNI']; 
}

$retour = mysql_query("SELECT * FROM utilisateur ORDER BY id");
$donnees = mysql_fetch_array($retour);

If (isset($_GET['id'])){
$variable = $_GET['id'];
$variable2 = str_replace("'", "", $variable);
}

$retourSecteur1 = mysqli_query($db,"SELECT * FROM articles WHERE secteur_id=1 ORDER BY datePublication DESC LIMIT 3");
$retourSecteur2 = mysqli_query($db,"SELECT * FROM articles WHERE secteur_id=2 ORDER BY datePublication DESC LIMIT 3");
$retourSecteur3 = mysqli_query($db,"SELECT * FROM articles WHERE secteur_id=3 ORDER BY datePublication DESC LIMIT 3");
$retourSecteur4 = mysqli_query($db,"SELECT * FROM articles WHERE secteur_id=4 ORDER BY datePublication DESC LIMIT 3");

$retourSecteurLibelle1 = mysqli_query($db, "SELECT libelleSecteur FROM assoc_secteur WHERE id=1");
$donneesSecteurLibelle1 = mysqli_fetch_array($retourSecteurLibelle1);

$retourSecteurLibelle2 = mysqli_query($db, "SELECT libelleSecteur FROM assoc_secteur WHERE id=2");
$donneesSecteurLibelle2 = mysqli_fetch_array($retourSecteurLibelle2);

$retourSecteurLibelle3 = mysqli_query($db, "SELECT libelleSecteur FROM assoc_secteur WHERE id=3");
$donneesSecteurLibelle3 = mysqli_fetch_array($retourSecteurLibelle3);

$retourSecteurLibelle4 = mysqli_query($db, "SELECT libelleSecteur FROM assoc_secteur WHERE id=4");
$donneesSecteurLibelle4 = mysqli_fetch_array($retourSecteurLibelle4);
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
              <li class="Toggle"><a class="Toggle" href="index.php"> Actualités <span class="icon-newspaper"></a>             
              </li>
              <?php if (!isAdmin()){
              print ('<li class="Toggle"><a class="Toggle" href="login.php"> <span class="icon-tools-2"></a>             
              </li>');
              } ?>
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
            <div class="row multi-columns-row">
              <h1 class="module-title font-alt">Share Your Dreams <span class="icon-global"></span></h1>
            <h3> <u> <?php echo $donneesSecteurLibelle1['libelleSecteur'];?></u> : </h3>
              <?php
                    while ($donneesSecteur1 = mysqli_fetch_array($retourSecteur1)) // On fait une boucle pour lister les Messages 
                      {?>
                        <div class="col-md-3 col-sm-6 col-xs-3">
                          <a class="content-box" href="EnvoiArticle.php?id=<?php echo $donneesSecteur1['id']?>">
                          <div class="content-box-image" style="height: 325px">
                            <h3 class="content-box-title font-serif"><?php echo $donneesSecteur1['titre_t'];?></h3>
                            <p> <?php echo $donneesSecteur1['paragraphe_t'];?></p>
                            <h4 class="content-box-title font-serif"><?php echo date("d-m-Y H:i", strtotime($donneesSecteur1['datePublication']));?></h4>
                          </div>
                          </a>
                        </div>
                     <?php } ?>
              <div class="col-md-3 col-sm-6 col-xs-3"><a class="content-box" href="ListeArticles.php?id=1">
                  <div class="content-box-image">
                    <h3 class="content-box-title font-serif">Plus d'articles</h3>
                    <img src="assets/images/EDF/newspaper.png" alt="3" height="25px" width="25px">
                    <h4 class="content-box-title font-serif">...</h4></div>
                  </a></div>

              </div>
               <div class="row multi-columns-row">

            <h3> <u> <?php echo $donneesSecteurLibelle2['libelleSecteur'];?></u> : </h3>
              <?php
                    while ($donneesSecteur2 = mysqli_fetch_array($retourSecteur2)) // On fait une boucle pour lister les Messages 
                      {?>
                        <div class="col-md-3 col-sm-6 col-xs-3">
                          <a class="content-box" href="EnvoiArticle.php?id=<?php echo $donneesSecteur2['id']?>">
                          <div class="content-box-image" style="height: 325px">
                            <h3 class="content-box-title font-serif"><?php echo $donneesSecteur2['titre_t'];?></h3>
                            <p> <?php echo $donneesSecteur2['paragraphe_t'];?></p>
                            <h4 class="content-box-title font-serif"><?php echo date("d-m-Y H:i", strtotime($donneesSecteur2['datePublication']));?></h4>
                          </div>
                          </a>
                        </div>
                     <?php } ?>
              <div class="col-md-3 col-sm-6 col-xs-3"><a class="content-box" href="ListeArticles.php?id=2">
                  <div class="content-box-image">
                    <h3 class="content-box-title font-serif">Plus d'articles</h3>
                    <img src="assets/images/EDF/newspaper.png" alt="3" height="25px" width="25px">
                    <h4 class="content-box-title font-serif">...</h4></div>
                  </a></div>

              </div><div class="row multi-columns-row">

            <h3> <u> <?php echo $donneesSecteurLibelle3['libelleSecteur'];?></u> : </h3>
              <?php
                    while ($donneesSecteur3 = mysqli_fetch_array($retourSecteur3)) // On fait une boucle pour lister les Messages 
                      {?>
                        <div class="col-md-3 col-sm-6 col-xs-3">
                          <a class="content-box" href="EnvoiArticle.php?id=<?php echo $donneesSecteur3['id']?>">
                          <div class="content-box-image" style="height: 325px">
                            <h3 class="content-box-title font-serif"><?php echo $donneesSecteur3['titre_t'];?></h3>
                            <p> <?php echo $donneesSecteur3['paragraphe_t'];?></p>
                            <h4 class="content-box-title font-serif"><?php echo date("d-m-Y H:i", strtotime($donneesSecteur3['datePublication']));?></h4>
                          </div>
                          </a>
                        </div>
                     <?php } ?>
              <div class="col-md-3 col-sm-6 col-xs-3"><a class="content-box" href="ListeArticles.php?id=3">
                  <div class="content-box-image">
                    <h3 class="content-box-title font-serif">Plus d'articles</h3>
                    <img src="assets/images/EDF/newspaper.png" alt="3" height="25px" width="25px">
                    <h4 class="content-box-title font-serif">...</h4></div>
                  </a></div>

              </div>

              <div class="row multi-columns-row">

            <h3> <u> <?php echo $donneesSecteurLibelle4['libelleSecteur'];?></u> : </h3>
              <?php
                    while ($donneesSecteur4 = mysqli_fetch_array($retourSecteur4)) // On fait une boucle pour lister les Messages 
                      {?>
                        <div class="col-md-3 col-sm-6 col-xs-3">
                          <a class="content-box" href="EnvoiArticle.php?id=<?php echo $donneesSecteur4['id']?>">
                          <div class="content-box-image" style="height: 325px">
                            <h3 class="content-box-title font-serif"><?php echo $donneesSecteur4['titre_t'];?></h3>
                            <p> <?php echo $donneesSecteur4['paragraphe_t'];?></p>
                            <h4 class="content-box-title font-serif"><?php echo date("d-m-Y H:i", strtotime($donneesSecteur4['datePublication']));?></h4>
                          </div>
                          </a>
                        </div>
                     <?php } ?>
              <div class="col-md-3 col-sm-6 col-xs-3"><a class="content-box" href="ListeArticles.php?id=4">
                  <div class="content-box-image">
                    <h3 class="content-box-title font-serif">Plus d'articles</h3>
                    <img src="assets/images/EDF/newspaper.png" alt="3" height="25px" width="25px">
                    <h4 class="content-box-title font-serif">...</h4></div>
                  </a></div>

              </div>
        </section>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <?php scriptJS(); ?>
  </body>
</html>