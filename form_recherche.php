<?php

require 'debut_html.php';
require 'header.php';

?>

    <form action="" method="">
            <label for="jnba_nom">Retrouvez vos joueurs préférés : </label>
            <input type="search" autocomplete="off" list="meilleurs_joueurs_nba" id="jnba_nom" name="joueurs"/>
            <datalist id="meilleurs_joueurs_nba">
                <option value="Lebron James">
                <option value="Michael Jordan">
                <option value="Wilt Chamberlain">
                <option value="Magic Johnson">
                <option value="Kobe Bryant">
                <option value="Stephen Curry">
                <option value="Kevin Durant">
                <option value="James Harden">
                <option value="Shaquille O'Neal">
                <option value="Tony Parker">
            </datalist>
            <input class="btn btn-primary" type="submit" value="Rechercher" id="submit">
    </form>