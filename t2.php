<?php
    if ( (empty($_POST['prenom'])) || (empty($_POST['age'])) ) {
        header('Location: form2.php');
    }

    echo '<p>Votre prénom : '.$_POST['prenom'].'</p>'."\n";
    echo '<p>Votre âge : '.$_POST['age'].'</p>'."\n";
    ?>