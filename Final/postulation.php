<?php

session_start();

// On vérifie si une session est en cours
if(!isset($_SESSION['mail'])){
    header('Location: ./overview.php');
    exit();
}
else{
    // On récupère l'id de l'advertisement
    $id_ad = $_POST['idad'];
}

// On se connecte à la base de données
try{
    $bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

// On vérifie qu'une ancienne postulation n'a pas été réalisé précedemment
$reponse = $bdd->query('SELECT * FROM application');
while($donnees = $reponse->fetch()){
    if($_SESSION['mail'] == $donnees['mails'] && $id_ad == $donnees['ad']){
        header('Location: ./index.php');
        exit("You already apply to this one !");
    }
}
$reponse->closeCursor();

// On écrit dans la table application
$req = $bdd->prepare('INSERT INTO application(mails, people, phone, ad) VALUES(?,?,?,?)');
$req->execute(array($_SESSION['mail'], $_SESSION['name'], $_SESSION['phone'], $id_ad));

echo "Your apply is successfull !";

// On redirige l'utilisateur sur sa page de profil
header('Location: ./overview.php');

?>