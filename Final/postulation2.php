
				<?php
					$link = mysqli_connect('localhost', 'root', '','jobteaser');
					$req = 'INSERT INTO application VALUES(NULL,  "'.$_POST['mails'].'","'.$_POST['people'].'","'.$_POST['phone'].'","'.$_POST['idad'].'")';
					mysqli_query($link, $req);
					mysqli_close($link);
					header('Location: index.php');
				?>
