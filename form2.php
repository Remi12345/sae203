<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>Connexion</h1>
        <form method="post" action="t2.php">
            <label for="prenom">Votre prénom : </label>
            <input type="text" name="prenom" id="prenom"><script>alert('Mauvais prénom !!!')</script><br />
            <label for="age">Votre âge : </label>
            <input type="text" name="age" id="age"> ans.<script>alert('Mauvais âge !!!')</script><br />
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>