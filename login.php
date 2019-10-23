<?php include('function.php'); ?>

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
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation"  style="background-color: #509e2f">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="login.php" style="color: #fff">Share Your Dreams</a>
          </div>
        </div>
      </nav>

      <div class="main showcase-page">
        <section class="module-medium" id="demos">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h4 class="font-alt mb-0">Connexion à Share Your Dream</h4>
                <hr class="divider-w mt-10 mb-20">
                <form class="form" role="form" action="login.php" method="POST"> <!--sql/verification2.php-->
                  <div class="form-group">
                    <input class="form-control input-lg" placeholder="Identifiant" name="login"  required/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" placeholder="Mot de Passe" name="motdepasse" required/>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-g btn-round" type="submit" id="submit" name="login_btn"><i class="icon-key"></i>Se connecter</button>                   </div>
                  <?php
                    if(isset($_GET['erreur'])){
                      $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                          echo "<p style='color:red'>NNI ou mot de passe incorrect</p>";
                      }
                  ?>
                </form>
              </div>
            </di>
        </section>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <?php scriptJS(); ?>
  </body>
</html>
