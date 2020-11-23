<?php
    session_start();

    if(!isset($_SESSION['admin']) OR $_SESSION['admin'] == 0){
        header('Location: ../index.php');
        exit();
    }
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../style/style.php" />
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        
        <title>JobBoard</title>
    </head>

    <body>
        <?php

        $bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
        $reponse = $bdd->query('SELECT * FROM people');

        ?>
        <header>
            <h1>Welcome on JobBoard</h1>
            <p>Join the community and find the job of your dreams</p>
            <nav>
                <ul class="mainnav">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../formulaire.php">Companies</a></li>
                    <li><a href="./advertisement_admin.php">Advertisement table</a></li>
					<li><a href="./application_admin.php">Application table</a></li>
                </ul>
                <ul class="secondnav">
                <form class="search" method="post" action="">
                    <label for="searchbar">Search: </label>
                    <input type="search" id="search" name="searchbar" />
                    <input type="submit" id="submit" value="Search" />
                </form>
                    <li class="unroll"><a href="#">Profile</a>
                        <ul class="under">
                            <li><a href="../login.php">Log in</a></li>
                            <li><a href="../register.php">Register</a></li>
                            <li><a href="../overview.php">Overview</a></li>
                            <li><a href="../deconnexion.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <p id="affichage">
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Category</th>
					<th>Description</th>
					<th>Mail</th>
					<th>Phone</th>
					<th>Password</th>
                    <th>Admin</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
		<?php
		while ($donnees = $reponse->fetch())
{
?>


		
				<tr>
					<td><?php echo $donnees['id']?></td>
					<td><?php echo $donnees['name']?></td>
					<td><?php echo $donnees['category']?></td>
					<td><?php echo $donnees['description']?></td>
					<td><?php echo $donnees['mail']?></td>
					<td><?php echo $donnees['phone']?></td>
					<td><?php echo $donnees['password']?></td>
                    <td><?php echo $donnees['admin']?></td>
					<td>
						<form action="./update/update_people.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $donnees['id'] ?>" >
						<input type="hidden" name="name" value="<?php echo $donnees['name']?>" >
						<input type="hidden" name="category" value="<?php echo $donnees['category']?>" >
						<input type="hidden" name="description" value="<?php echo $donnees['description']?>" >
						<input type="hidden" name="mail" value="<?php echo $donnees['mail'] ?>" >
						<input type="hidden" name="phone" value="<?php echo $donnees['phone']?>" >
						<input type="hidden" name="password" value="<?php echo $donnees['password']?>" >
                        <input type="hidden" name="admin" value="<?php echo $donnees['admin']?>" >
						<input type="submit" name="update" value="Update">
						</form>
					</td>
					<td><form action="delete.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $donnees['id'] ?>" >
						<input type="hidden" name="table" value="people" >
						<input type="submit" name="delete" value="Delete">
						</form>
					</td>
				</tr>
			
		<?php
}

$reponse->closeCursor();

?>
			</tbody>
		</table>
		 <button class="ad05" id="add">Add line</button>
			<div class="ad05" id="learnmore">
			<form method="post" action="./add/formulaire_people.php" class="formtype">
                <label for="name">NAME</label>
                <input type="text" name="name"required/>
                <label for="category">CATEGORY</label>
                <input type="text" name="category" required/>
                <label for="description">DESCRIPTION</label>
                <input type="text" name="description" required/>
                <label for="location">MAIL</label>
                <input type="text" name="mail" required/>
                <label for="salary">PHONE</label>
                <input type="text" name="phone" required/>
                <label for="password">PASSWORD</label>
                <input type="text" name="password" required/>
                <label for="admin">ADMIN</label>
                <input type="text" name="admin" value=0 required/>
                <input type="submit" id="submit" value="Create" />
            </form>
        </div>
        </p>
        <footer>
            
        </footer>
        <script src="../script/admin.js"></script>
    </body>
</html>