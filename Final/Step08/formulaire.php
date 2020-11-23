<?php
    session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="./style/style.php" />
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
                <form class="search" method="post" action="./research.php">
                    <label for="searchbar">Search : </label>
                    <input type="search" id="search" name="searchbar" />
                    <input type="submit" id="submit" value="Search" />
                </form>
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
            <p>Please fill in the formular in order to create the advertisement</p>
            <form method="post" action="formulaire_server.php" class="formtype">
                <label for="name">NAME</label>
                    <input type="text" name="name" required/>
                <label for="description">DESCRIPTION</label>
                    <input type="text" name="description" required/>
                <label for="category">CATEGORY</label>
                    <input type="text" name="category" required/>
                <label for="location">LOCATION</label>
                    <input type="text" name="location" required/>
                <label for="salary">SALARY</label>
                    <input type="text" name="salary" required/>
                <label for="duration">DURATION</label>
                    <input type="text" name="duration" required/>
                <label for="company">COMPANY</label>
                    <input type="text" name="company" required/>
                    <input type="submit" id="submit" value="Create" />
            </form>
            <p>Your advertisement will be online in a few moments...</p>
        </article>

        <footer>

        </footer>
        <script src="./script/main.js"></script>
    </body>
</html>