<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>Connexion</h1>
        <form method="post" action="t1.php">
            <label for="email">e-mail : </label>
            <input type="text" name="email" id="email"><br />
            <label for="mdp">mot de passe : </label>
            <input type="password" name="mdp" id="mdp"><br />
            <input type="submit" value="Vérifier">
        </form>
    </body>
</html>
<?php
    if ( (empty($_POST['email'])) || (empty($_POST['mdp'])) ){
        header('Location: form1.php');
    }

    echo '<p>'.$_POST['email'].'</p>'."\n";
    echo '<p>'.$_POST['mdp'].'</p>'."\n";
    ?>