<?php

$bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
$reponse = $bdd->query('SELECET * FROM advertisement');
?>