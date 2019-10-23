<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
// connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'proessaBeta';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
 
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    $admin = mysqli_real_escape_string($db,htmlspecialchars($_POST['admin'])); // Code rajouté pour ADMIN
 

    if($username !== "" && $password !== "")
    {
        //La requete COMPTE le nombre d'utilisitateur corresponsdant à la combinaison username/password dans la table 'utilisateur'
        $requete = "SELECT count(*) FROM utilisateur where NNI = '".$username."' and MotDePasse = '".$password."'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $countNormal = $reponse['count(*)'];
 
        //SI countNormal est > 0 alors ça veut dire que la combinaison userName/password correspond à un utilisateur normal
        if ($countNormal > 0) {
            header('location: ../index.php');
        }
        else{
            header('Location: ../login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
 
        //si on n'entre pas dans le IF precedent, ça veut dire que la combinaison username/password n'existe pas dans la table user
 
        //La requete COMPTE le nombre d'utilisitateur corresponsdant à la combinaison userName/PassWord/booleenAdmin
        $requeteAdmin = "SELECT count(*)  FROM utilisateur where NNI = '".$username."' and MotDePasse = '".$password."'" ;
        $requeteAdmin = "SELECT count(*)  FROM utilisateur where NNI = '".$username."' and MotDePasse = '".$password."' and admin = '".$admin."'" ;
 
 
        $exec_requeteAdmin = mysqli_query($db,$requeteAdmin);
        $reponseAdmin = mysqli_fetch_array($exec_requeteAdmin);
        $countAdmin = $reponseAdmin['count(*)'];      
        //SI countAdmin est > 0 alors ça veut dire que la combinaison userName/password correspond à un utilisateur admin

        if ($countAdmin > 0) {
            header('Location: ../admin.php');
 
            //header('Location: admin.html');
        }     
    }
    else
    {
        header('Location: ../login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
    header('Location: ../login.php');
}
mysqli_close($db); // fermer la connexion
?>