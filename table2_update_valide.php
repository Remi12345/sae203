<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	    <hr />
	    <h1>Modifier une franchise</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	

	        $noms=$_POST['nom'];
	        $palmares=$_POST['palmares'];
            $meilleurjoueurs=$_POST['meilleurjoueur'];
	        $id=$_POST['num'];
	      //  var_dump($_POST);
	      //  var_dump($_FILES);
	        $co=connexionBD();
	        modifierBD2($co, $noms, $palmares, $meilleurjoueurs, $id);
	        deconnexionBD($co);
	    ?>
	</body>
</html>