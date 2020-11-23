
<?php
	$bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
	$req ='INSERT INTO application VALUES(NULL,"'.$_POST['mails'].'", "'.$_POST['people'].'", "'.$_POST['phone'].'", "'.$_POST['ad'].'")';
	$resultat = $bdd->query($req);
	var_dump($_SERVER["HTTP_REFERER"]);
	header('Location: ../application_admin.php');
?>