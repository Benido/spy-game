<!DOCTYPE html>
<html>
<head>
    <title>Ma page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/spy-game/public/styles.css" />
</head>
<body class="d-flex flex-column">
    <header class="d-flex justify-content-between p-3">
        <a class="siteTitle" href="/spy-game/index.php"><h1>Spy game - Gérez les espions du KGB</h1></a>
        <p><?php echo (isset($_SESSION['username'])) ? 'Bienvenue '.$_SESSION["username"] : '' ?></p>
        <section>
            <nav>
                <ul class="menu">
                    <li>
                        <a href="/spy-game/src/controller/front/<?php echo (isset($_SESSION['username']) ? 'logout' : 'login') ?>.php">
                            <?php echo (isset($_SESSION['username']) ? 'Déconnexion' : 'Connexion')?>
                        </a>
                    </li>
                   <?php echo (isset($_SESSION['username'])) ?
                   '<li>
                        <a href="/spy-game/src/controller/back/missions.php">Tableau de bord</a>
                    </li>'
                    : null ?>
                </ul>
            </nav>
        </section>
    </header>
    <main class="flex-fill" id="#main">
        <?php echo($content) ?>
    </main>
    <footer>
        <p>2022 - Tous droits réservés</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php if (isset($data['scriptTabledit'])) {
        echo '    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" defer></script>
    <script type="text/javascript" src="/spy-game/public/scripts/jquery.tabledit.js" defer></script>
    <script type="text/javascript" src="/spy-game/public/scripts/' . $data['scriptTabledit'] . '" defer></script>';
    } ?>
</body>
</html>
