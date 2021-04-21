<?php
require_once("dataBase.php");
$db = DataBase::connect();

//Get categories
$getAllCategory = $db->query('SELECT * FROM categorie');

// Requête INSERTION d'un film
$nom_film = $categorie_film = $annee_film = $image =  "";

//Init des champs que je n'ai pas réussi à intégrer dans la requete insert :
$id_realisateur = 0;
$image = 'placeholder.jpeg';
//

if(!empty($_POST['nom_film']) || !empty($_POST['annee_film']) || !empty($_POST['categorie_film']))
{
    $nom_film = htmlspecialchars($_POST['nom_film']);    
    $categorie_film = htmlspecialchars($_POST['categorie_film']);    
    $annee_film  = htmlspecialchars($_POST['annee_film']);  

    $req = $db->prepare("INSERT INTO film (nom_film, annee_film, id_realisateur, id_categorie, image) VALUES(?, ?, ?, ?, ?)");
    $req->execute(array($nom_film, $annee_film, $id_realisateur, $categorie_film, $image));
    header("Location: index.php");
}


?>

<form class="form" action="insertFilm.php" method="post">
    <input name="nom_film" type="text" placeholder="*Nom du film" />
    <input style='display:none;' type="text" placeholder="*Nom du réalisateur" />
    <select name="categorie_film">
        <option value="">Chosir une catégorie</option>
        <?php
        foreach($getAllCategory as $categorie)
        {
        echo '<option value="'.$categorie['id_categorie'].'">'.$categorie['nom_categorie'].'</option>';
        }
        ?>
    </select>
    <input name="annee_film" type=" number" placeholder="*Année" />
    <button class="btn--header">Valider</button>
</form>