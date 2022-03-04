<?php
require 'debut_html.php';
require 'header.php';

$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'MotDePasseFortDeVotreChoix');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM meilleurs_joueurs_nba INNER JOIN franchises_nba ON meilleurs_joueurs_nba._franchises_id = franchises_nba.franchises_id";
$resultat = $mabd->query($req);
foreach ($resultat as $value) {
    echo $value['jnba_classement'] .'e'.' - ' . $value['jnba_nom'];
    echo '<br>' .'<p class="classement">'. $value['franchises_nom'];
    echo '<br>'.'<p class="classement">'. $value['jnba_poste'];
    echo '<br>' .'<p class="classement">'. $value['jnba_nationalite'];
    echo '<img class="image" src="photos/'.$value['jnba_photo'].'">'.'<hr>';
}
?>