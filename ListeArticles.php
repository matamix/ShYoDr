
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
              <h1 class="module-title font-alt">Tous les Articles <span class="icon-documents"></span></h1>
            <h3> <u><?php echo $donneesLibelle['libelleSecteur']?></u> : </h3>
            <?php
                    while ($donnees = mysqli_fetch_array($retourArticles)) // On fait une boucle pour lister les Messages 
                      {?>
                        <div class="col-md-3 col-sm-6 col-xs-3">
                          <a class="content-box" href="EnvoiArticle.php?id=<?php echo $donnees['id'];?>">
                          <div class="content-box-image" style="height: 325px">
                            <h3 class="content-box-title font-serif"><?php echo $donnees['titre_l'];?></h3>
                            <p> <?php echo $donnees['paragraphe_l'];?></p>
                            <h4 class="content-box-title font-serif"><?php echo date("d-m-Y H:i", strtotime($donnees['datePublication']));?></h4>
                          </div>
                          </a>
                        </div>
                     <?php } ?>
        </section>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <?php scriptJS(); ?>
  </body>
</html>