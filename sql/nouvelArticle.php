<?php
$db = mysqli_connect("localhost","root","root","applivd");

$Titre = $_POST['titre']; 
$ParagrapheLinkedin = $_POST['linkedin']; 
$ParagrapheTwitter = $_POST['twitter'];
$Secteur_id = $_POST['idSecteur'];

$sql = "INSERT INTO articles(titre_l,paragraphe_l,paragraphe_t,datePublication,secteur_id) VALUES('$Titre','$ParagrapheLinkedin','$ParagrapheTwitter',NOW(),'$Secteur_id')";
mysqli_query($db,$sql);
mysqli_close($db);


header('Location: ../index.php');

