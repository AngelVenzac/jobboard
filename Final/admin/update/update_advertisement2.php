
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
	$req ='UPDATE `advertisement` SET  `name`="'.$_POST['name'].'",  `description`="'.$_POST['description'].'", `category`="'.$_POST['category'].'", `lieu`="'.$_POST['lieu'].'", `salary` ="'.$_POST['salary'].'",  `duration` ="'.$_POST['duration'].'",  `company` ="'.$_POST['company'].'" WHERE `advertisement`.`id`='.$_POST['id'].'';
	$resultat = $bdd->query($req);
	var_dump($_SERVER["HTTP_REFERER"]);
	header('Location: ../advertisement_admin.php');
?>