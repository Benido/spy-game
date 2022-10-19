<!DOCTYPE html>
<html>
<head>
    <title>Ma page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/spy-game/public/styles.css" />
</head>
<body>
    <header>
        <a class="siteTitle" href="/spy-game/index.php"><h1>Spy game - Gérez les espions du KGB</h1></a>
    <section>
        <nav>
            <ul class="menu">
                <li><a href="/spy-game/src/controller/front/<?php echo (isset($_SESSION['username']) ? 'logout' : 'login') ?>.php">
                        <?php echo (isset($_SESSION['username']) ? 'Déconnexion' : 'Connexion')?>
                    </a>
                </li>
            </ul>
    </header>
        </nav>
    </section>
    <section>
        <?php echo($content) ?>
    </section>
    <footer>
        <p>2022 - Tous droits réservés</p>
    </footer>
</body>
</html>
