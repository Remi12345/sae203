<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'MotDePasseFortDeVotreChoix');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM meilleurs_joueurs_nba INNER JOIN franchises_nba ON meilleurs_joueurs_nba._franchises_id = franchises_nba.franchises_id";
$resultat = $mabd->query($req);
foreach ($resultat as $value) {
    echo $value['jnba_classement'] . ' , ' . $value['jnba_nom'];
    echo '<br> franchises_nba: ' . $value['franchises_nom']. '<hr>';
}
foreach ($resultat as $value) {
    echo '<div class="album">' ;
    echo '<h3>'.$value['jnba_classement'] . '</h3>';
    echo '<p>' . $value['jnba_poste'] . '</p>';
    echo '<p class="page">' . $value['jnba_nationalite'] . '</p>';
    echo '<p class="auteur">' . $value['franchises_nom'] . '</p>';
    echo '</div>';
}
?>