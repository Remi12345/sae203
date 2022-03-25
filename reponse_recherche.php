<?php
    require 'lib_crud.inc.php';
    $co=connexionBD();
    afficherResultatRecherche($co);
    deconnexionBD($co);
?>