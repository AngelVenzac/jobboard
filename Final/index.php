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
                <form class="search" method="post" action="">
                    <label for="searchbar">Search: </label>
                    <input type="search" id="search" name="searchbar" />
                    <input type="submit" id="submit" value="Search" />
                </form>
                <?php $research = htmlentities(isset($_POST['searchbar']) ? $_POST['searchbar'] : ''); ?>
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
		<?php
        $i = 1;

        if(isset($_POST['searchbar'])){
            $reponse = $bdd->query("SELECT * FROM advertisement WHERE name LIKE '%$research%' OR description LIKE '%$research%' OR lieu LIKE '%$research%' OR category LIKE '%$research%' OR company LIKE '%$research%'");
        }
        else{
            $reponse = $bdd->query('SELECT * FROM advertisement');
        }

        while ($donnees = $reponse->fetch()){
        ?>

        <article id="<?php echo "ad' . $i . '" ?>">
            <h2><?php echo $donnees['name']?></h2>
            <p><?php echo $donnees['description']?></p>
            <p>Company: <?php echo $donnees['company']?></p>
            <button <?php echo 'class="ad' . $i . '"' ?>>learn more</button>
        </article>
        
        <div <?php echo 'class="ad' . $i . '"' ?> id="learnmore">
            <p>Location: <?php echo $donnees['lieu']?>
            <p>Salary: <?php echo $donnees['salary']?> per month.</p>
            <p>Category: <?php echo $donnees['category']?></p>
            <p>Duration: <?php echo $donnees['duration']?> months.</p>
            <form method="post" 
            <?php if(isset($_SESSION['mail'])){
                ?> action="./postulation.php" <?php
            }
            else{
                ?> action="./postulation_nolog.php" <?php
            }
            ?>
            >
                <label type="hidden" for="idad"></label>
                <input type="hidden" name="idad" value="<?php echo $donnees['id']; ?>" />
                <input type="submit" id="submit" value="Apply" />
            </form>
        </div>
        <?php
        ++$i;
        }

        $reponse->closeCursor();
        ?>

        <footer>
            
        </footer>
        <script src="./script/main.js"></script>
    </body>
</html>