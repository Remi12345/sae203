    <body>
        <a href="../index.php">Accueil</a>
        <h1>Gestion des données</h1>

        <p><a href="table1_new_form.php">Ajouter un joueur</a></p>
        <?php
            require '../lib_crud.inc.php';
            $co=connexionBD();
            afficherListe($co);
            deconnexionBD($co);
        ?>
    </body>
