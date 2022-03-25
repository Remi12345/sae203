<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter un joueur</h1>
	    <hr />
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
	        Classement : <input type="number" name="classement" min="0" max="3000" required /><br />
	        Joueur : <input type="text" name="joueurs" required /><br />
			Poste : <input type="text" name="poste" required /><br />
			Nationalité : <input type="text" name="nationalite" required /><br />
	        Photo : <input type="file" name="photo" required /><br />
	        Franchises : <select name="franchises" required>
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>