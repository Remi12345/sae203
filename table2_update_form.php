<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
</head>
<body style="font-family:sans-serif;">
    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	<hr>
    <h1>Modifier une franchise</h1>
    <hr />
    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $album=getBD2($co, $id);
        var_dump($album);
        deconnexionBD($co);
    ?>
    <form action="table2_update_valide.php" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="num" value="<?= $id; ?>" />
        Meilleur joueur de l'histoire :  <input type="text" name="meilleurjoueur" required/><br />        
        Palmarès : <input type="text" name="palmares"  required/><br />
        Nom : <select name="nom" required>
        <?php
            $co=connexionBD();
            afficherAuteursOptionsSelectionne2($co, $album['franchises_id']);
            deconnexionBD($co);
        ?>
        </select><br />
        <input type="submit" value="Modifier" />
    </form>
</body>
</html>