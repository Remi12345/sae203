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
	    <?php
	        require '../lib_crud.inc.php';
	
	        $nom=$_POST['nom'];
	        $meilleurjoueur=$_POST['meilleurjoueur'];
	        $palmares=$_POST['palmares'];
	       // var_dump($_POST);
	       // var_dump($_FILES);
	
	        $co=connexionBD();
	        ajouterBD2($co, $nom, $meilleurjoueur, $palmares);
	        deconnexionBD($co);
	    ?>
	</body>
</html>