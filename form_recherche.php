<?php

require 'debut_html.php';
require 'header.php';

?>

<form action="" method="">
            <label for="meilleurs_joueurs_nba">nom du personnage :</label>
            <input type="search" autocomplete="off" list="mielleurs_joueurs_nba" id="joueurs" name="joeuurs"/>
            <datalist id="joueurs">
            <option value="Lebron James">
            <option value="Michael Jordan">
            <option value="Wilt Chamberlain">
            <option value="Magic Johnson">
            <option value="KObe Bryant">
            <option value="Stephen Curry">
            <option value="Kevin Durant">
            <option value="James Harden">
            <option value="Shaquille O'Neal">
            <option value="Tony Parker">
            <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
        </datalist>
    </form>