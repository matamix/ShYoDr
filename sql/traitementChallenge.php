<?php
session_start();
try
{
// connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'proessaBeta';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
  
//récupération des valeurs des champs:
if (isset($_POST)) { 
$ChallengeGaz = $_POST['ChallengeGaz'];
 
if (isset($_POST['ChallengeGaz'])) {
				$SQLQuery = "UPDATE 'utilisateur' SET Texte = ':$ChallengeGaz' Where id ='2' ";
				
			}
			else {
			//	$SQLQuery .= "INSERT INTO utilisateur (Texte)"; 
			//	$SQLQuery .= "VALUES ('$ChallengeGaz') WHERE id ='2'";
			}
			mysqli_query($db, $SQLQuery);
		//}
// fermeture de la connection à la bdd
mysql_close();

header("Location: ../admin.php");
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>