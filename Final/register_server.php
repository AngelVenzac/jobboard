<?php

// On vérifie les entrées utilisateur (Never Trust User Input)
error_reporting(E_ALL);

// Check si POST est vide
if(!empty($_POST)){
    foreach($_POST as $cle=>$val){
        if(empty($val)){
            echo "The area' . $cle . 'is required !";
        }
    }
}

// Check username, category, description
$username = htmlentities($_POST['username']);
$category = htmlentities($_POST['category']);
$description = htmlentities($_POST['description']);

// Check useremail
if(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ " , $_POST['useremail'])){
    $useremail = htmlentities($_POST['useremail']);
}
else{
    echo "Your email address is invalid !";
}

try{
    $bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT mail FROM people');
while($donnees = $reponse->fetch()){
    if($useremail == $donnees['mail']){
        echo "Your email address is invalid !";
        header('Location: ./login.php');
    }
}
$reponse->closeCursor();

// Check userphone
if(preg_match(" #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# ", $_POST['userphone'])){
    $userphone = htmlentities($_POST['userphone']);
}
else{
    echo "Your phone number is invalid !";
}

//Check password
if(htmlspecialchars($_POST['userpassword1']) != NULL && htmlspecialchars($_POST['userpassword2']) != NULL){
    if(htmlspecialchars($_POST['userpassword1']) == htmlspecialchars($_POST['userpassword2'])){
        $userpassword = htmlspecialchars($_POST['userpassword1']);
    }
    else{
        echo "Your password's entries must be equivalents";
    }
}
else{
    echo "Your password must not contain HTML caracters !";
}

// On se connecte à la database pour lui envoyer les données
try{
    $bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO people(name, category, description, mail, phone, password) VALUES(?,?,?,?,?,?)');
$req->execute(array($username, $category, $description, $useremail, $userphone, $userpassword));

echo "Your account was created successfully !";


// On redirige l'utilisateur sur la page de connexion
header('Location: login.php');

?>