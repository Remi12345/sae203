<?php
require 'debut_html.php';
require 'header.php';
?>
<html>
    <div id="div">
<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'MotDePasseFortDeVotreChoix');
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM meilleurs_joueurs_nba INNER JOIN franchises_nba ON meilleurs_joueurs_nba._franchises_id = franchises_nba.franchises_id";
$resultat = $mabd->query($req);
foreach ($resultat as $value) {
    echo '<article class="divs">'.'<p class="classement">'.$value['jnba_classement'] .'e'.' - ' .'<p class="classements">'. $value['jnba_nom'].'</article>';
    echo '<article class="divs">'.'<p class="classement">'. $value['franchises_nom'].'</article>';
    echo '<article class="divs">'.'<p class="classement">'. $value['jnba_poste'].'</article>';
    echo '<article class="divs">'.'<p class="classement">'. $value['jnba_nationalite'].'</article>';
    echo '<article class="divs">'.'<br/>'.'<img class="image" src="photos/'.$value['jnba_photo'].'">'.'</article>'.'<hr>';
}
?>
</div>
</html>