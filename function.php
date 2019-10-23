<?php

session_start();

$db = mysqli_connect('localhost', 'root', 'root', 'applivd');

$username = "";
$email    = "";
$errors   = array(); 
//$loginUtilisateur = $_SESSION['user']['NNI']; 

function linkHead(){
  $script='<meta charset="utf-8mb4">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--   
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/EDF/Logo/57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/EDF/Logo/60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/EDF/Logo/72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/EDF/Logo/76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/EDF/Logo/114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/EDF/Logo/120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/EDF/Logo/144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/EDF/Logo/152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/EDF/Logo/180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/EDF/Logo/192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/EDF/Logo/32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/EDF/Logo/96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/EDF/Logo/16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/EDF/Logo/144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">';
    print ($script);
}



function scriptJS(){
  $script='<script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>';
    print($script);
}



function openDB(){
  $base = @mysql_connect ("localhost", "root", "root");
  if (!$base) die('Erreur de connection');
  mysql_select_db ('applivd', $base) ;
}

function isLoggedIn()
{
  if (isset($_SESSION['user'])) {
    return true;
  }else{
    return false;
  }
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
  login();
}

function login(){
  global $db, $username, $errors;

  // grap form values
  $username = e($_POST['login']);
  $password = e($_POST['motdepasse']);

  // make sure form is filled properly
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // attempt login if no errors on form
  if (count($errors) == 0) {
    //$password = md5($password);

    $query = "SELECT * FROM utilisateur WHERE NNI='$username' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    // si l'utilisateur n'existe pas dans la BDD : renvoyez nul part (debuggage)
    //if (mysqli_num_rows($results) == 0) { 
    //  header('location: caca.php'); }
    
    if (mysqli_num_rows($results) == 1) { 
      // user found
      // check if user is admin or user
      $logged_in_user = mysqli_fetch_assoc($results);
      if ($logged_in_user['admin'] == '1') {

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: index.php');      
      }else{
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        header('location: index.php');
      }
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

function isAdmin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == '1' ) {
    return true;
  }else{
    return false;
  }
}
function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: login.php");
}

function display_error() {
  global $errors;

  if (count($errors) > 0){
    echo '<div class="error">';
      foreach ($errors as $error){
        echo $error .'<br>';
      }
    echo '</div>';
  }
} 

// return user array from their id
function getUserById($id){
  global $db;
  $query = "SELECT * FROM users WHERE id=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}

if (isset($_POST['btn_envoyer_chat'])) {
	addMessageChat();}
  
function addMessageChat(){
$db = mysqli_connect('localhost', 'root', 'root', 'proessabeta');
$Nom = $_POST['Nom'];
$Message = $_POST['Message'];
$Avatar = $_POST['Avatar'];
mysqli_query($db,"INSERT INTO message(Nom,Message,libelleAvatar) VALUES('$Nom','$Message','$Avatar')");
header('Location: chat.php');}


//switch($_GET['fn']) {
//case 'deco':
//	deco();
//    break;
//default:
//}

if (isset($_POST['btn_deco'])) {
	deco();}

function deco(){
session_start();
session_destroy();
header('location: login.php');
exit;}

if (isset($_POST['btn_supprimer_user'])) {
  supprimerUser();}

//$id_user_delete = $_GET['id'];
//$variable3 = $_GET['id'];
//$id_user_delete = str_replace("%27", "", $variable3);


if (isset($_POST['btn_envoyer_defi'])) {
	addDefi();}
	
function addDefi(){
$db = mysqli_connect('localhost', 'root', 'root', 'proessabeta');

$id = $_POST['id'];
$id_defier = $_POST['id_defier'];
$date = $_POST['date'];
$entite = $_POST['entite'];
$value = $_POST['value'];

$datecourante = date('Y-m-d', time());
$date1 = strtotime($datecourante);
$date2 = strtotime($date);
$nbJoursTimestamp = $date2 - $date1;

$nbJours = $nbJoursTimestamp/86400;

$nbJoursExact = round($nbJours, 0, PHP_ROUND_HALF_UP);

//echo $id;
//echo $id_defier;
//echo $entite;
//echo $value;
//echo $date;
//echo $nbJoursExact;

if (!$db->query("INSERT INTO assoc_user_defi(id_user_lance_defi,id_user_defier,id_entite,value,date_fin,nbr_jours,terminer) VALUES('$id','$id_defier','$entite','$value','$date','$nbJoursExact',0)")) {
    printf("Errormessage: %s\n", $db->error);
}
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: Affichage_Defi.php');
}
else{
header('Location: Affichage_Defi.php');}
//mysqli_query($db,"INSERT INTO assoc_user_defi(id_user_lance_defi,id_user_defier,id_entite,value,nbr_jours, date_fin) VALUES('$id','$id_defier','$entite','$value','$entite','$nbJoursExact','$date')");
//header('Location: utilisateur.php');
} 

if (isset($_POST['btn_calcul_date'])) {
  DefiTerminer();}

function DefiTerminer(){
$db = mysqli_connect('localhost', 'root', 'root', 'proessabeta');
$retour = mysqli_query($db,"SELECT id,date_fin, terminer FROM assoc_user_defi");

while($row = mysqli_fetch_array($retour)){
$date = $row['date_fin'];
$datecourante = date('Y-m-d', time());
$datecouranteconvertiestr = strtotime($datecourante);
$datefinconvertiestr = strtotime($date);

$datecalcul = $datefinconvertiestr - $datecouranteconvertiestr;

echo "</br>".$datecalcul."</br>";
if($datecalcul < 0){
  
  $query = "UPDATE assoc_user_defi SET terminer = 1 WHERE id = ".$row['id']."";
  mysqli_query($db,$query);
  
}}}

$deleteID = 0;
//$modifyID = 0;

if (isset($_POST['btn_supprimer_user'])) {
  global $deleteID;
  $deleteID = $_POST['id'];
  if(!empty($deleteID)){
  supprimerUser();
  }}

function supprimerUser(){
  global $deleteID;
  $db = mysqli_connect('localhost', 'root', 'root', 'proessabeta');
  $retourDelete = mysqli_query($db,"SELECT * FROM utilisateur");

while($rowDelete = mysqli_fetch_array($retourDelete)){
  if($deleteID == $rowDelete['id']){
    $query = "UPDATE utilisateur SET actif = 0 WHERE id = ".$rowDelete['id']."";
    mysqli_query($db,$query);
}}}

//if (isset($_POST['btn_modifier_user'])) {
//  global $modifyID;
//  $modifyID = $_POST['id'];
//  if(!empty($deleteID)){
//      header(location:'();
//  }}
  
//function modifierUser()
//  global $deleteID;
//  $db = mysqli_connect("localhost","root","root","proessabeta"); 
//  $retourModify = mysqli_query($db,"SELECT * FROM utilisateur");
//  $MotDePasse = $_POST['MotDePasse']; //  mysqli_real_escape_string(htmlspecialchars($_POST['MotDePasse']));
//  $MotDePasse2 = $_POST['MotDePasse2'];

