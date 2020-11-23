<?php
    session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="./style/style.php" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        
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
            <?php
                if(isset($_SESSION['mail'])){
                    ?>
                    <p>You are already connected</p>
                    <?php
                }
                else{
            ?>
            <p>Welcome on the login page</p>
            <form class="formtype" method="post" action="./login_server.php">
                <label for="useremail">E-MAIL</label>
                    <input type="email" id="useremail" name="useremail" required />
                <label for="userpassword">PASSWORD</label>
                    <input type="password" id="password" name="userpassword" required />
                    <input type="submit" id="submit" value="Connect" />
                <a href="./register.php" id="register">Create an account</a>
            </form>
            <?php
                }
            ?>
        </article>
        
        <footer>

        </footer>
        <script src="./script/main.js"></script>
    </body>
</html>