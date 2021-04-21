<?php
require_once("dataBase.php");

// Requête simple liste des films classés par année de sortie (affichage limité à 4 films). 
$db = DataBase::connect();
$films = $db->query('SELECT * FROM film ORDER BY annee_film DESC LIMIT 4');
      
?>

<div class="films__container--film width--2">
    <?php
            foreach($films as $film)
            {
                echo '<div class="film">';
                echo '<img src="./public/images/'.$film['image'].'" alt="affiche d un film" />';
                echo '<h3>'.$film['nom_film'].'</h3>';
                echo '<p>Année de sortie : '.$film['annee_film'].'</p>';
                echo '</div>';
            }
            ?>
</div>