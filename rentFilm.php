<?php
require_once("dataBase.php");

//Requete JOINTURE EXTERNE qui retourne les films NON loués 
$db = DataBase::connect();
$req = $db->query('SELECT * FROM film LEFT JOIN emprunt ON film.id_film = emprunt.id_film WHERE emprunt.id_film IS NULL');

?>


<div class="reserved__container width--2">
    <div class="reserved__container--film">
        <?php
        foreach($req as $film)
        {
            echo '<div class="reserved--film">';
            echo '<p>'.$film['nom_film'].'</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>