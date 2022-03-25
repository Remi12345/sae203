<?php

require 'debut_html.php';
require 'header.php';

?>
<br /><br /><br />
    <form action="reponse_recherche.php" method="GET">
        <label for="jnba_poste" class="font">Retrouvez vos joueurs préférés : </label>
        <input type="search" id="real" list="meilleurs_joueurs_nba" name="texte" autocomplete="off" />
        <datalist id="meilleurs_joueurs_nba">
        <?php
            // On va afficher ici la datalist
            require 'lib_crud.inc.php';
            $co=connexionBD();
            genererDatalistAuteurs($co);
            deconnexionBD($co);
        ?>
        </datalist>
        <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
    </form>
