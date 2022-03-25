
		<?php
		    require 'lib_crud.inc.php';
		    $co=connexionBD();
		    afficherCatalogue($co);
		    deconnexionBD($co);
		?>