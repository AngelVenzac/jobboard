<?php
session_start();
?>

<html>
<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
    <link rel="stylesheet" type="text/css" href="./style/style.php" />
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
                <form class="search" method="post" action="">
                    <label for="searchbar">Search: </label>
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
        <article class="articletype">
            <form class="formtype" method="post" action="postulation2.php">
                <input type="hidden" name="idad" value="<?php echo $_POST['idad'] ?>">
                <label>Mail</label><input type="text" name="mails" /><br>
                <label>First and last name</label><input type="text" name="people" /><br>
                <label>Phone</label><input type="text" name="phone" /><br>
                <input type="submit" id="submit" value="Valider" />
            </form>
        </article>
</body>
<script src="main.js"></script>
</html>