<?php

$Banque_id = $_POST['BanqueID'];

echo $Banque_id;
header('Location: ../banque.php?id='.$Banque_id.'');

?>

