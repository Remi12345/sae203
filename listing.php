<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'MotDePasseFortDeVotreChoix');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM meilleurs_joueurs_nba INNER JOIN franchises_nba ON meilleurs_joueurs_nba._franchises_id = franchises_nba.franchises_id";
$resultat = $mabd->query($req);
foreach ($resultat as $value) {
    echo $value['jnba_classement'] . ' , '  $value['jnba_nom'] . $value['jnba_poste'] . $value['jnba_nationalite'] . $value['jnba_photo'];
    echo '<br> franchises_nba: ' . $value['franchises_nom']. $value['franchises_meilleurjoueur'] . ['franchises_palmares'] '<hr>';
}
foreach ($resultat as $value) {
    echo '<div class="album">' ;
    echo '<h3>'.$value['bd_titre'] . '</h3>;
    echo '<p>tarif: ' . $value['bd_prix'] . ' euro </p>';
    echo '<p class="page">' . $value['bd_page'] . ' pages </p>';
    echo '<p class='auteur'> auteur: ' . $value['auteur_nom'] . '</p>';
    echo '</div>';
}
?>