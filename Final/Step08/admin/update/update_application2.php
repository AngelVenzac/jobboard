
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
	$req ='UPDATE `application` SET  `mails`="'.$_POST['mails'].'",  `people`="'.$_POST['people'].'", `phone`="'.$_POST['phone'].'", `ad`="'.$_POST['ad'].'" WHERE `application`.`id`='.$_POST['id'].'';
	$resultat = $bdd->query($req);
	var_dump($_SERVER["HTTP_REFERER"]);
	header('Location: ../application_admin.php');
?>