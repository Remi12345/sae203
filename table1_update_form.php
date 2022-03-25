<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
</head>
<body style="font-family:sans-serif;">
    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	<hr>
    <h1>Modifier un joueur</h1>
    <hr />
    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $album=getBD($co, $id);
        var_dump($album);
        deconnexionBD($co);
    ?>
    <form action="table1_update_valide.php" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="num" value="<?= $id; ?>" />
        Classement : <input type="number" name="classement" min="0" max="3000" required /><br />
	        Joueur : <input type="text" name="joueurs" required /><br />
			Poste : <input type="text" name="poste" required /><br />
			Nationalité : <input type="text" name="nationalite" required /><br />
	        Photo : <input type="file" name="photo" required /><br />
	        Franchises : <select name="franchises" required>
        <?php
            $co=connexionBD();
            afficherAuteursOptionsSelectionne($co, $album['_franchises_id']);
            deconnexionBD($co);
        ?>
        </select><br />
        <input type="submit" value="Modifier" />
    </form>
</body>
</html>