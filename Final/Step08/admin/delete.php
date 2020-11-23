
				<?php
					$link = mysqli_connect('localhost', 'root', '','jobteaser');
					$req = 'DELETE FROM '.$_POST['table'].' WHERE id="'.$_POST['id'].'"';
					mysqli_query($link, $req);
					mysqli_close($link);
					header('Location: '.$_POST['table'].'_admin.php');
				?>
