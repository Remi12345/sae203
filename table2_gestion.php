<body>
        <a href="../index.php">Accueil</a>
        <h1>Gestion des données</h1>

        <p><a href="table2_new_form.php">Ajouter une franchise</a></p>
        <?php
            require '../lib_crud.inc.php';
            $co=connexionBD();
            afficherListe2($co);
            deconnexionBD($co);
        ?>
    </body>
