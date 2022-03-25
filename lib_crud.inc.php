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
       echo '<article class="divs">'.'<br/>'.'<img class="image" src="images/uploads/'.$value['jnba_photo'].'">'.'</article>'.'</div>';
}
    }      
    // affichage de la liste des albums pour la gestion
    function afficherListe($mabd) {
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
        echo '<table>'."\n";
        echo '<thead><tr><th>Classement</th><th>Photo</th><th>Joueur</th><th>Poste</th><th>Nationalité</th><th>Equipe</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
        echo '<tbody>'."\n";
        foreach ($resultat as $value) {
            echo '<tr>'."\n";
            echo '<td>'.$value['jnba_classement'].'</td>'."\n";
            echo '<td><img class="image" src="../images/uploads/'.$value['jnba_photo'].'" alt="image_'.$value['jnba_id'].'" /></td>'."\n";
            echo '<td>'.$value['jnba_nom'].'</td>'."\n";
            echo '<td>'.ucfirst($value['jnba_poste']).'</td>'."\n";
            echo '<td>'.ucfirst($value['jnba_nationalite']).'</td>'."\n";
            echo '<td>'.ucfirst($value['franchises_nom']).'</td>'."\n";
            echo '<td><a href="table1_update_form.php?num='.$value['jnba_id'].'">Modifier</a></td>'."\n";
            echo '<td><a href="table1_delete.php?num='.$value['jnba_id'].'">Supprimer</a></td>'."\n";
            echo '</tr>'."\n";
        }
        echo '</tbody>'."\n";
        echo '</table>'."\n";
    }       
        // afficher les auteurs (prénom et nom) dans des champs "option"
        function afficherAuteursOptions($mabd) {
          // on sélectionne tous les auteurs de la table auteurs
            $req = "SELECT * FROM franchises_nba";
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            // pour chaque auteur, on met son id, son prénom et son nom 
            // dans une balise <option>
            foreach ($resultat as $value) {
                echo '<option value="'.$value['franchises_id'].'">'; // id de l'auteur
                echo $value['franchises_nom']; // prénom espace nom
                echo '</option>'."\n";
            }
        }     
        // fonction d'ajout d'une BD dans la table bande_dessinees
        function ajouterBD($co, $joueurs, $classement, $poste, $nouvelleImage, $nationalite, $franchises)
        {
            $req = 'INSERT INTO meilleurs_joueurs_nba (jnba_classement, jnba_nom, jnba_poste, jnba_nationalite, jnba_photo, _franchises_id) VALUES ( "'.$classement.'","'.$joueurs.'", "'.$nationalite.'", "'.$nouvelleImage.'",  "'.$poste.'","'.$franchises.'")';
            echo '<p>' . $req . '</p>' . "\n";
            try {
                $resultat = $co->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            if ($resultat->rowCount() == 1) {
                echo '<p>Le joueur ' . $joueurs . ' a été ajouté au catalogue.</p>' . "\n";
            } else {
                echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
                die();
            }
        }
        // fonction d'effacement d'une BD
        function effaceBD($mabd, $id) {
            $req = 'DELETE FROM meilleurs_joueurs_nba WHERE jnba_id='.$id;'';
            echo '<p>'.$req.'</p>'."\n";
            try{
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            if ($resultat->rowCount()==1) {
                echo '<p>Le joueur '.$id.' a été supprimée du catalogue.</p>'."\n";
            } else {
                echo '<p>Erreur lors de la suppression.</p>'."\n";
                die();
            }
        }
            function getBD($mabd, $idAlbum) {         
            $req = 'SELECT * FROM meilleurs_joueurs_nba WHERE jnba_id='.$idAlbum;'';        
             echo '<p>GetBD() : '.$req.'</p>'."\n";           
             try {              
                 $resultat = $mabd->query($req);          } 
             catch (PDOException $e) {               
                 // s'il y a une erreur, on l'affiche               
                  echo '<p>Erreur : ' . $e->getMessage() . '</p>';               
                  die();        // la fonction retourne le tableau associat       
                   // contenant les champs et leurs valeur             
                  return $resultat->fetch();
             }
            }
	// afficher le "bon" auteur parmi les auteurs (prénom et nom)
    //dans les balises "<option>"
	function afficherAuteursOptionsSelectionne($mabd, $idAuteur) {
        $req = "SELECT * FROM franchises_nba";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        foreach ($resultat as $value) {
            echo '<option value="'.$value['franchises_id'].'"';
            if ($value['franchises_id']==$idAuteur) {
                echo ' selected="selected"';
            }
            echo '>';
            echo $value['franchises_nom'];
            echo '</option>'."\n";
        }
    }
	// fonction de modification d'une BD dans la table bande_dessinees
    function modifierBD($mabd, $id, $joueurs, $classement, $nationalite, $nouvelleImage, $poste, $franchises)
    {
        $req = 'UPDATE meilleurs_joueurs_nba
                SET 
                    jnba_id="'.$id.'", jnba_photo="'.$nouvelleImage.'", jnba_nom="'.$joueurs.'", jnba_classement="'.$classement.'", jnba_nationalite="'.$nationalite.'", jnba_poste="'.$poste.'", _franchises_id="'.$franchises.'"
                WHERE jnba_id='.$id;
     //   echo '<p>' . $req . '</p>' . "\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>Le joueur ' . $joueurs . ' a été modifié.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de la modification.</p>' . "\n";
            die();
        }
    }
    function afficherListe2($mabd) {
        $req = "SELECT * FROM franchises_nba
                INNER JOIN meilleurs_joueurs_nba
                ON franchises_nba.franchises_id = meilleurs_joueurs_nba.jnba_id";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<table>'."\n";
        echo '<thead><tr><th>Nom</th><th>Meilleur joueur de l\'équipe</th><th>Palmarès</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
        echo '<tbody>'."\n";
        foreach ($resultat as $value) {
            echo '<tr>'."\n";
            echo '<td>'.$value['franchises_nom'].'</td>'."\n";
            echo '<td>'.ucfirst($value['franchises_meilleurjoueur']).'</td>'."\n";
            echo '<td>'.ucfirst($value['franchises_palmares']).'</td>'."\n";
            echo '<td><a href="table2_update_form.php?num='.$value['jnba_id'].'">Modifier</a></td>'."\n";
            echo '<td><a href="table2_delete.php?num='.$value['jnba_id'].'">Supprimer</a></td>'."\n";
            echo '</tr>'."\n";
        }
        echo '</tbody>'."\n";
        echo '</table>'."\n";
    }      
    function afficherAuteursOptions2($mabd) {
        // on sélectionne tous les auteurs de la table auteurs
          $req = "SELECT * FROM meilleurs_joueurs_nba";
          try {
              $resultat = $mabd->query($req);
          } catch (PDOException $e) {
              // s'il y a une erreur, on l'affiche
              echo '<p>Erreur : ' . $e->getMessage() . '</p>';
              die();
          }
          // pour chaque auteur, on met son id, son prénom et son nom 
          // dans une balise <option>
          foreach ($resultat as $value) {
              echo '<option value="'.$value['jnba_id'].'">'; // id de l'auteur
              echo $value['jnba_nom']; // prénom espace nom
              echo '</option>'."\n";
          }
      }     
         // fonction d'ajout d'une BD dans la table bande_dessinees
    function ajouterBD2($mabd, $nom, $meilleurjoueur, $palmares){
        $req = 'INSERT INTO franchises_nba (franchises_nom, franchises_meilleurjoueur, franchises_palmares) VALUES ("'.$nom.'","'.$meilleurjoueur.'","'.$palmares.'")';
        echo '<p>' . $req . '</p>' . "\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La bande dessinée ' . $nom . ' a été ajoutée au catalogue.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
            die();
        }
    }
    function effaceBD2($mabd, $id) {
        $req = 'DELETE FROM franchises_nba WHERE franchises_id='.$id;'';
     //   echo '<p>'.$req.'</p>'."\n";
        try{
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount()==1) {
            echo '<p>Le joueur '.$id.' a été supprimée du catalogue.</p>'."\n";
        } else {
            echo '<p>Erreur lors de la suppression.</p>'."\n";
            die();
        }
    }
    function getBD2($mabd, $idAlbum) {         
        $req = 'SELECT * FROM franchises_nba WHERE franchises_id='.$idAlbum;        
         echo '<p>GetBD() : '.$req.'</p>'."\n";           
         try {              
             $resultat = $mabd->query($req);          } 
         catch (PDOException $e) {               
             // s'il y a une erreur, on l'affiche               
              echo '<p>Erreur : ' . $e->getMessage() . '</p>';               
              die();        // la fonction retourne le tableau associat       
               // contenant les champs et leurs valeur             
              return $resultat->fetch();
         }
        }
        function afficherAuteursOptionsSelectionne2($mabd, $idAuteur) {
            $req = "SELECT * FROM franchises_nba";
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            foreach ($resultat as $value) {
                echo '<option value="'.$value['franchises_nom'].'"';
                if ($value['franchises_nom']==$idAuteur) {
                    echo ' selected="selected"';
                }
                echo '>';
                echo $value['franchises_nom'];
                echo '</option>'."\n";
            }
        }
        function modifierBD2($mabd, $noms, $palmares, $meilleurjoueurs, $id )
        {
            $req = 'UPDATE franchises_nba
                    SET 
                        franchises_nom="'.$noms.'" , franchises_palmares="'.$palmares.'", franchises_meilleurjoueur="'.$meilleurjoueurs.'", franchises_id="'.$id.'"
                    WHERE franchises_id='.$id;
         //   echo '<p>' . $req . '</p>' . "\n";
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            if ($resultat->rowCount() == 1) {
                echo '<p>La franchise ' . $noms . ' a été modifiée.</p>' . "\n";
            } else {
                echo '<p>Erreur lors de la modification.</p>' . "\n";
                die();
            }
        }
        // Génération de la liste des auteurs dans le formulaire de recherche
function genererDatalistAuteurs($mabd) {
    // on sélectionne le nom et prénom de tous les auteurs de la table auteurs
    $req = "SELECT jnba_poste FROM meilleurs_joueurs_nba";
    echo $req ;
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // pour chaque auteur, on met son nom <option>
    foreach ($resultat as $value) {
        echo '<option value="'. $value['jnba_poste'] .'">'; 
    } 
}
// affichage des resultats de recherche
function afficherResultatRecherche($mabd) {
    $jnba_poste= $_GET['texte'];
    $req = 'SELECT * FROM meilleurs_joueurs_nba 
            INNER JOIN franchises_nba
            ON meilleurs_joueurs_nba._franchises_id = franchises_nba.franchises_id
            WHERE jnba_poste
            LIKE "'.$jnba_poste.'"';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    echo '<br />';
        echo '<h1>Les meilleurs ' . $jnba_poste . ' de l\'histoire de la NBA</h1>' . "\n";
        echo '<br />';
    echo '<table>'."\n";
    echo '<thead><tr><th>Classement</th><th>Photo</th><th>Joueur</th><th>Nationalité</th><th>Equipe</th></tr></thead>'."\n";
    echo '<tbody>'."\n";
    foreach ($resultat as $value) {
        echo '<tr>'."\n";
        echo '<td>'.$value['jnba_classement'].'</td>'."\n";
        echo '<td><img class="image" src="../images/uploads/'.$value['jnba_photo'].'" alt="image_'.$value['jnba_id'].'" /></td>'."\n";
        echo '<td>'.$value['jnba_nom'].'</td>'."\n";
        echo '<td>'.ucfirst($value['jnba_nationalite']).'</td>'."\n";
        echo '<td>'.ucfirst($value['franchises_nom']).'</td>'."\n";
        echo '</tr>'."\n";
    }
    echo '</tbody>'."\n";
    echo '</table>'."\n";
}

