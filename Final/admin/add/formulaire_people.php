
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
	$req ='INSERT INTO people VALUES(NULL,"'.$_POST['name'].'", "'.$_POST['category'].'", "'.$_POST['description'].'", "'.$_POST['mail'].'", "'.$_POST['phone'].'", "'.$_POST['password'].'", "'.$_POST['admin'].'")';
	$resultat = $bdd->query($req);
	var_dump($_SERVER["HTTP_REFERER"]);
	header('Location: ../people_admin.php');
?>