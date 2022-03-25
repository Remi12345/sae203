<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une franchise</h1>
	    <hr />
	    <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
	        Franchise : <input type="text" name="nom" required /><br />
            Palmarès : <input type="text" name="palmares" required /><br />
			Meilleur joueur de l'histoire : <select name="meilleurjoueur" required>
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions2($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>