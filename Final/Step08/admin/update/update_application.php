﻿<?php
    session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="../../style/style.php" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>JobBoard</title>
    </head>

    <body>
    <header>
            <h1>Welcome on JobBoard</h1>
            <p>Join the community and find the job of your dreams</p>
            <nav>
                <ul class="mainnav">
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./formulaire.php">Companies</a></li>
                </ul>
                <ul class="secondnav">
                    <label for="search">Search : </label>
                    <input type="search" id="search" name="searchbar" />
                    <button class="searchbutton">Search</button>
                    <li class="unroll"><a href="#">Profile</a>
                        <ul class="under">
                            <li><a href="./login.php">Log in</a></li>
                            <li><a href="./register.php">Register</a></li>
                            <li><a href="./overview.php">Overview</a></li>
                            <li><a href="./deconnexion.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

        <article class="articletype"  id="longarticle">
            <form action="update_application2.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $_POST['id'] ?>" >
						<label for="mails">MAILS:</label>
						<input type="text" name="mails" value="<?php echo $_POST['mails'] ?>" ><br>
						<label for="people">PEOPLE:</label>
						<input type="text" name="people" value="<?php echo $_POST['people'] ?>" ><br>
						<label for="phone">PHONE:</label>
						<input type="text" name="phone" value="<?php echo $_POST['phone'] ?>" ><br>
						<label for="ad">AD:</label>
						<input type="text" name="ad" value="<?php echo $_POST['ad'] ?>" >
						<input type="submit" name="update" value="Update">
			</form>
        </article>

        <footer>

        </footer>
        <script src="./script/main.js"></script>
    </body>
</html>