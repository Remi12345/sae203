<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>Connexion</h1>
        <form method="post" action="t1.php">
            <label for="email">e-mail : </label>
            <input type="text" name="email" id="email"><script>alert('Mauvais email !!!')</script><br />
            <label for="mdp">mot de passe : </label>
            <input type="password" name="mdp" id="mdp"><script>alert('Muavais mot de passe !!!')</script><br />
            <input type="submit" value="Vérifier">
        </form>
    </body>
</html>