<?php
    require 'secretxyz123.inc.php';
    require 'debut_html.php';
    require 'header.php';
      
        // connexion à la base de données
        function connexionBD()
        {
          // on initialise la variable de connexion à null
          $mabd = null;
          try {
            // on essaie de se connecter
            // le port et le dbname ci-dessous sont À ADAPTER à vos données
            $mabd = new PDO('mysql:host=127.0.0.1;port=3306;
                      dbname=sae203;charset=UTF8;', 
                      LUTILISATEUR, LEMOTDEPASSE);
            // on passe le codage en utf-8
            $mabd->query('SET NAMES utf8;');
          } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
          }
          // on retourne la variable de connexion
          return $mabd;
        }
        function deconnexionBD(&$mabd) {
            // on se déconnexte en mettant la variable de connexion à null 
            $mabd=null;
          }
        // déconnexion de la base de données
      // affichage du catalogue des BDs
      function afficherCatalogue($mabd) {
        $req = "SELECT * FROM meilleurs_joueurs_nba 
                INNER JOIN franchises_nba
                ON meilleurs_joueurs_nba._franchises_id = franchises_nba.franchises_id";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // ICI VOTRE CODE POUR AFFICHER LES ALBUMS
        foreach ($resultat as $value) {
          echo '<div class="oui"><article class="divs">'.'<p class="classement">'.$value['jnba_classement'] .'e'.' - ' .'<p class="classements">'. $value['jnba_nom'].'</article>';
          echo '<article class="divs">'.'<p class="classement">'. $value['franchises_nom'].'</article>';
          echo '<article class="divs">'.'<p class="classement">'. $value['jnba_poste'].'</article>';
          echo '<article class="divs">'.'<p class="classement">'. $value['jnba_nationalite'].'</article>';
          echo '<article class="divs">'.'<br/>'.'<img class="image" src="photos/'.$value['jnba_photo'].'">'.'</article>'.'<hr></div>';
      }
    }