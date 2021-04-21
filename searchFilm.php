<?php
require_once("dataBase.php");
$db = Database::connect();
$nom_film = $categorie_film = $annee_film = $image =  "";

//Requêtes pour remplir les input select
$years = '';
$categories = '';

if (!empty($_POST['years']))
{
    $years = $_POST['years'];
}

if (!empty($_POST['categories']))
{
    $categories = $_POST['categories'];
}

//Get years
$getAllYears = $db->query('SELECT annee_film FROM film ORDER BY annee_film DESC');

//Get categories
$getAllCategory = $db->query('SELECT * FROM categorie');
?>

<!-- Formulaire recherche par année (requete SELECTION) : -->
<?php
$findFilmsByYear = $db->prepare('SELECT * FROM film WHERE annee_film = ?');
$findFilmsByYear->execute(array($years));
?>

<form class="form__search" method="POST" action='index.php#search'>
    <select class="select" name="years">
        <option value="">Par année</option>
        <?php
        foreach($getAllYears as $year)
        {
            echo '<option value="'.$year['annee_film'].'">'.$year['annee_film'].'</option>';
        }
        ?>
    </select>
    <button class="btn--header">Rechercher</button>
</form>

<!-- Résultat de la requete selection de films par année -->
<?php
if (!empty($_POST['years']))
{
    echo '<div class="search__container--result">';
    echo '<p>Résultat :</p>';
    echo '<div class="films__container--film">';
    foreach($findFilmsByYear as $film)
    {
        echo '<div class="film">';
        echo '<img src="./public/images/'.$film['image'].'" alt="" />';
        echo '<h3>'.$film['nom_film'].'</h3>';
        echo '<p>Année de sortie : '.$film['annee_film'].'</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>

<!-- Formulaire recherche par catégorie (requete avec JOINTURE) : -->
<?php
$findFilmsByCategory = $db->prepare('SELECT film.nom_film, film.annee_film, film.image, categorie.nom_categorie FROM film 
INNER JOIN categorie ON film.id_categorie = categorie.id_categorie WHERE categorie.id_categorie = ?');

$findFilmsByCategory->execute(array($categories));
?>
<form class="form__search" method="POST" action='index.php#search'>
    <select class="select" name="categories">
        <option value="">Par catégorie</option>
        <?php
        foreach($getAllCategory as $categorie)
        {
        echo '<option value="'.$categorie['id_categorie'].'">'.$categorie['nom_categorie'].'</option>';
        }
        ?>
    </select>
    <button class="btn--header">Rechercher</button>
</form>

<!-- Résultat de la requete jointure pour trouver un film d'une certaine catégorie -->
<?php
if (!empty($_POST['categories']))
{
    echo '<div class="search__container--result">';
    echo '<p>Résultat :</p>';
    echo '<div class="films__container--film">';
    foreach($findFilmsByCategory as $film2)
    {
        echo '<div class="film">';
        echo '<img src="./public/images/'.$film2['image'].'" alt="" />';
        echo '<h3>'.$film2['nom_film'].'</h3>';
        echo '<p>Année de sortie : '.$film2['annee_film'].'</p>';
        echo ' <p>Catégorie : '.$film2['nom_categorie'].'</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';

}
?>