<?php
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

$retourArticles = mysqli_query($db,"SELECT * FROM articles WHERE id=".$variable2.""); 
$donneesArticles = mysqli_fetch_array($retourArticles);
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
          <div class="navbar-header" >
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
            <div class="row">
              <h1 class="module-title font-alt">Partagez <span class="icon-rss"></span></h1>
              <div class="col-sm-8 col-sm-offset-2">
                <h4 class="font-alt mb-0">Partagez cet Article : </h4>
                <hr class="divider-w mt-10 mb-20">
            </div>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <div class="col-md-12 col-sm-6 col-xs-3"><a class="content-box" href="#">
                  <div class="content-box-image">
                    <h3 class="content-box-title font-serif"><?php echo $donneesArticles['titre_l'];?></h3>
                    <p> <?php echo $donneesArticles['paragraphe_l'];?></p>
                    <!--<img src="assets/images/EDF/1.jpg" alt="1" height="588" width="359px">-->
                    <h4 class="content-box-title font-serif"><?php echo date("d-m-Y H:i", strtotime($donneesArticles['datePublication']));?></h4>
                  </div>
                  </a></div>
              </div>
              <div class="col-sm-8 col-sm-offset-2">
                <form class="form" role="form" method="POST">

                  <div class="form-group">
                    <h4> <u>Votre Tweet</u> :</h4>
                    <textarea class="form-control" rows="7" placeholder="Textarea" name="twitter" id="to-copyTwitter"> <?php echo $donneesArticles['paragraphe_t'];?></textarea>
                    <button id="copyTwitter" type="button"><span class="icon-clipboard"></span> Copier</button>
                  </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo $donneesArticles['paragraphe_t'];?>" data-show-count="false" data-url="https://www.edf.fr/">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
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
    <script type="text/javascript">
      var toCopyTitre  = document.getElementById( 'to-copyTitre' ),
      btnCopyTitre = document.getElementById( 'copyTitre' );

      btnCopyTitre.addEventListener( 'click', function(){
      toCopyTitre.select();
      document.execCommand( 'copy' );
      return false;
      } );

      var toCopyLinkedin  = document.getElementById( 'to-copyLinkedin' ),
      btnCopyLinkedin = document.getElementById( 'copyLinkedin' );

      btnCopyLinkedin.addEventListener( 'click', function(){
      toCopyLinkedin.select();
      document.execCommand( 'copy' );
      return false;
      } );

      var toCopyTwitter  = document.getElementById( 'to-copyTwitter' ),
      btnCopyTwitter = document.getElementById( 'copyTwitter' );

      btnCopyTwitter.addEventListener( 'click', function(){
      toCopyTwitter.select();
      document.execCommand( 'copy' );
      return false;
      } );
    </script>

    <script>
      {
    "author": "urn:li:person:8675309",
    "lifecycleState": "PUBLISHED",
    "specificContent": {
        "com.linkedin.ugc.ShareContent": {
            "shareCommentary": {
                "text": "Learning more about LinkedIn by reading the LinkedIn Blog!"
            },
            "shareMediaCategory": "ARTICLE",
            "media": [
                {
                    "status": "READY",
                    "description": {
                        "text": "Official LinkedIn Blog - Your source for insights and information about LinkedIn."
                    },
                    "originalUrl": "https://blog.linkedin.com/",
                    "title": {
                        "text": "Official LinkedIn Blog"
                    }
                }
            ]
        }
    },
    "visibility": {
        "com.linkedin.ugc.MemberNetworkVisibility": "CONNECTIONS"
    }
}
    </script>
  </body>
</html>