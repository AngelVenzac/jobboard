
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
	$req ='UPDATE `people` SET  `name`="'.$_POST['name'].'",  `description`="'.$_POST['description'].'", `category`="'.$_POST['category'].'", `mail`="'.$_POST['mail'].'", `phone` ="'.$_POST['phone'].'",  `password` ="'.$_POST['password'].'",  `admin` ="'.$_POST['admin'].'" WHERE `people`.`id`='.$_POST['id'].'';
	$resultat = $bdd->query($req);
	var_dump($_SERVER["HTTP_REFERER"]);
	header('Location: ../people_admin.php');
?>