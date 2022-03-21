		<a href="index.php">Accueil</a>
        <a href="listing.php">Catalogue</a>
        <a href="admin/admin.php">Admin.</a>
		<?php
		    require 'lib_crud.inc.php';
		    $co=connexionBD();
		    afficherCatalogue($co);
		    deconnexionBD($co);
		?>
</html>