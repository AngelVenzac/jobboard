<?php

session_start();

// Check si POST est vide
if(!empty($_POST)){
    foreach($_POST as $cle=>$val){
        if(empty($val)){
            echo "The area' . $cle . 'is required !";
        }
    }
}

// Check useremail
if(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ " , $_POST['useremail'])){
    $useremail = htmlentities($_POST['useremail']);
}
else{
    echo "Your email address is invalid !";
}

//Check password
if(htmlspecialchars($_POST['userpassword']) != NULL && htmlspecialchars($_POST['userpassword']) != ""){
    $userpassword = htmlspecialchars($_POST['userpassword']);
}
else{
    echo "Please indicate your password";
}

// On se connecte à la database pour checker les données
try{
    $bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

// On récupère les variables de people pour les variables de session
$reponse = $bdd->query('SELECT * FROM people');

while($donnees = $reponse->fetch()){
    if($useremail == $donnees['mail'] && $userpassword == $donnees['password']){
        $_SESSION['name'] = $donnees['name'];
        $_SESSION['category'] = $donnees['category'];
        $_SESSION['description'] = $donnees['description'];
        $_SESSION['mail'] = $donnees['mail'];
        $_SESSION['phone'] = $donnees['phone'];
        $_SESSION['admin'] = $donnees['admin'];
    }
}

$reponse->closeCursor();

if($_SESSION['admin'] == 1){
    header('Location: ./admin/advertisement_admin.php');
    exit();
}
else{
    header('Location: index.php');
}

?>