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
                    <h3 class="content-box-title font-serif">Titre Article</h3>
                    <p> Paragraphe Article</p>
                    <!--<img src="assets/images/EDF/1.jpg" alt="1" height="588" width="359px">-->
                    <h4 class="content-box-title font-serif">Date Article</h4>
                  </div>
                  </a></div>
              </div>
              <div class="col-sm-8 col-sm-offset-2">
                <form class="form" role="form" method="POST">

                  <div class="form-group">
                    <h4> <u>Votre Tweet</u> :</h4>
                    <textarea class="form-control" rows="7" placeholder="Textarea" name="twitter" id="to-copyTwitter"> Paragraphe</textarea>
                    <button id="copyTwitter" type="button"><span class="icon-clipboard"></span> Copier</button>
                  </div>


                <div class="col-sm-6">
                  <div class="form-group">
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="" data-show-count="false" data-url="https://www.edf.fr/">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                  </div>
                </div>
                </form>
              </div>
              </div>
        </section>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
  </body>
</html>