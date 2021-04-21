<?php
require_once("dataBase.php");
$db = DataBase::connect();

//Sous requete :
$req = $db->query('SELECT * FROM film
WHERE id_film IN (
    SELECT id_film
    FROM `emprunt`
    WHERE id_film > 3
  )');
  

?>

<div class="best-film__container width--2">
    <div class="best-film__container--counter">
        <h5>Choisi par :</h5>
        <p>3 personnes</p>
    </div>
    <div class="best-film__container--img">
        <?php
        foreach($req as $film)
        {
            echo '<span class="iconify" data-inline="false" data-icon="emojione:star" style="font-size: 85px"></span>';
            echo '<img src="./public/images/'.$film['image'].'" alt="" />';
            echo '<h3>'.$film['nom_film'].'</h3>';
            echo '</div>';
            echo '</div>';
        }