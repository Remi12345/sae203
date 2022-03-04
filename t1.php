<?php
    if ( (empty($_POST['email'])) || (empty($_POST['mdp'])) ){
        header('Location: form1.php');
    }

    echo '<p>'.$_POST['email'].'</p>'."\n";
    echo '<p>'.$_POST['mdp'].'</p>'."\n";
    ?>