<?php
//$servername = "localhost";
//$database = "proessaBeta";
//$username = "root";
//$password = "root";

// Create connection

$db = mysqli_connect("localhost","root","root","proessabeta"); //or die("Connection failed: ".mysql_error());
//mysqli_select_db($db);//,$db); //or die("Connection failed: ".mysql_error());
// Check connection

//if (!$db) {
//      die("Connection failed: " . mysql_error());
//}
//	echo "Connected successfully";

// Verifie les deux mdp
$MotDePasse = $_POST['MotDePasse']; //  mysqli_real_escape_string(htmlspecialchars($_POST['MotDePasse']));
$MotDePasse2 = $_POST['MotDePasse2']; //  mysqli_real_escape_string(htmlspecialchars($_POST['MotDePasse2']));

//$MotDePasse = sha1($MotDePasse);

if($MotDePasse == $MotDePasse2)
{
	$NNI = $_POST['NNI']; // mysqli_real_escape3_string(htmlspecialchars();
	$Nom = $_POST['Nom']; //mysqli_real_escape_string(htmlspecialchars(]));
	$Prenom = $_POST['Prenom'];
	$Poste = $_POST['Poste']; // mysqli_real_escape_string(htmlspecialchars($_POST['Poste']));
	$Email = $_POST['Email'];
	$Admin = 0;
	$Actif = 1; // mysqli_real_escape_string(htmlspecialchars($_POST['']));
	$MotDePasse = $_POST['MotDePasse'];
	$Avatar = $_POST['Avatar']; // Je vais crypter le mot de passe.
//$MotDePasse = sha1($MotDePasse);
//$sql = "UPDATE utilisateur SET Nom='$Nom' WHERE id='2'";
	$sql = "INSERT INTO utilisateur(Nom,Prenom,NNI,Poste,Email,MotDePasse,libelleAvatar,admin,actif) VALUES('$Nom','$Prenom','$NNI','$Poste','$Email','$MotDePasse','$Avatar','$Admin','$Actif')";
	mysqli_query($db,$sql);
	mysqli_close($db);
} 
	else
	{
		echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
	}
header('Location: ../utilisateurAdmin.php');
