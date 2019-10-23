<?php
$db = mysqli_connect("localhost","root","root","applivd");

$Titre = $_POST['titre']; 
$Paragraphe = $_POST['texte']; 

$sql = "INSERT INTO banque(titre,texte,datePublication) VALUES('$Titre','$Paragraphe',NOW())";
mysqli_query($db,$sql);
mysqli_close($db);


header('Location: ../banque.php');

