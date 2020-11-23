
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
	$req ='INSERT INTO advertisement VALUES(NULL,"'.$_POST['name'].'", "'.$_POST['description'].'", "'.$_POST['category'].'", "'.$_POST['location'].'", "'.$_POST['salary'].'", "'.$_POST['duration'].'", "'.$_POST['company'].'")';
	$resultat = $bdd->query($req);
	var_dump($_SERVER["HTTP_REFERER"]);
	header('Location: formulaire.php');
?>