<?php
    session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="./style/style.php" />
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        
        <title>JobBoard</title>
    </head>

    <body>
        <?php

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        $reponse = $bdd->query('SELECT * FROM application');

        try{
            $bdd2 = new PDO('mysql:host=localhost;dbname=jobteaser;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        $reponse2 = $bdd2->query('SELECT * FROM advertisement');

        ?>
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

        <article id="longarticle">
            <?php
                if(!isset($_SESSION['mail'])){
                    ?>
                    <p>Sorry but you need to log in first</p>
                    <?php
                }
                else{
            ?>
                <p><strong>Here is your profile informations :</strong></p>
                <p>Name : <?php echo $_SESSION['name'] ?></p>
                <p>Category : <?php echo $_SESSION['category'] ?></p>
                <p>Description : <?php echo $_SESSION['description'] ?></p>
                <p>Mail : <?php echo $_SESSION['mail'] ?></p>
                <p>Phone : <?php echo $_SESSION['phone'] ?></p>
                <p>Admin : <?php echo $_SESSION['admin'] ?></p>
                <?php
                if(isset($_SESSION['admin']) == 1){
                    ?>
                    <a id="admin" href="./admin/people_admin.php">With a great power, comes great responsabilities...</a>
                    <?php
                }
                    $applied = false;
                    while ($donnees = $reponse->fetch()){
                        if($_SESSION['mail'] == $donnees['mails']){
                            $donnees2 = $reponse2->fetch()
                            ?>
                            <form method="post" class="applied" action="./delapply.php">
                                <em>You applied to the ad number : <?php echo $donnees['ad'] ?></em><br>
                                <em>Name : <?php echo $donnees2['name'] ?></em><br>
                                <em>Company : <?php echo $donnees2['company'] ?></em><br>
                                <em>Description : <?php echo $donnees2['description'] ?></em><br>
                                <em>Location : <?php echo $donnees2['lieu'] ?></em><br>
                                <label type="hidden" for="idad"></label>
                                <input type="hidden" name="idad" value="<?php echo $donnees['id']; ?>" />
                                <input type="submit" id="submit" value="Delete Apply" />
                            </form>
                            <?php
                            $applied = true;
                        }
                    }
                    if($applied == false){
                        ?>
                        <em>You didn't apply to any advertisement yet !</em><br>
                        <?php
                    }
                    $reponse->closeCursor();
                    $reponse2->closeCursor();
                }
            ?>
        </article>

        <footer>
        
        </footer>
        <script src="./script/main.js"></script>
    </body>
</html>