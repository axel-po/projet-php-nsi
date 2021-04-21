<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Les meilleurs films - Site de location de films</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./public/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon/favicon-16x16.png" />
    <link rel="manifest" href="./public/favicon/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./public/css/style.css" />
</head>

<body>
    <header id="header">
        <h1>
            Welcome to <br />
            the best films
        </h1>
        <p>Répertoire des meilleurs films</p>
        <a href="#films" class="btn--header">Voir les films</a>
    </header>

    <aside id="aside">
        <div class="aside__container width">
            <a href="#films" class="btn">Voir les films récents</a>
            <a href="#search" class="btn">Rechercher un film</a>
            <a href="#form" class="btn">Ajouter un film</a>
        </div>
    </aside>

    <section id="films">
        <div class="films__container--title width">
            <span class="span-new">Nouveau</span>
            <h2>Nos films <span>récents</span></h2>
        </div>
        <?php require 'lastFilms.php' ?>
    </section>

    <section id="search">
        <div class="films__container--title width">
            <h2><span>Recherche</span> d'un film</h2>
        </div>
        <div class="search__container width--2">
            <?php require 'searchFilm.php' ?>
        </div>
    </section>

    <section id="reserved">
        <div class="films__container--title width">
            <span class="span-new">Catalogue</span>
            <h2><span>Réserver</span> un film</h2>
            <p>Liste de tous nos films disponibles à la location</p>
        </div>
        <?php require 'rentFilm.php'; ?>
    </section>

    <section id="best-film">
        <h2>Film le mieux <span>noté</span> de la semaine</h2>
        <?php require 'bestFilm.php'; ?>
    </section>

    <section id="form">
        <div class="films__container--title width">
            <h2><span>Ajouter</span> un film à la liste</h2>
        </div>

        <div class="form__container width--2">
            <?php require 'insertFilm.php'; ?>
        </div>
    </section>

    <footer>
        <p>Projet NSI PHP & SQL</p>
    </footer>

    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
</body>

</html>