<?php

session_start();

// On récupère l'id de l'advertisement
$id_ad = $_POST['idad'];

// On se connecte à la base de données
try{
    $bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

// On delete l'ad en question
$reponse = $bdd->query('DELETE FROM application WHERE id = "'.$id_ad.'" AND mails = "'.$_SESSION['mail'].'"');

// On redirige l'utilisateur sur sa page de profil
header('Location: ./index.php');

?>