<?php session_start();?>

<!doctype html>
<html lang="fr">
  <head>
        <title>Connexion</title>   <!-- Élément spécifique -->
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="public/css/style.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://kit.fontawesome.com/22878924ef.js" crossorigin="anonymous"></script>

  </head>
  <body>

    <section class="fondco">

        <div class="formulaireConnexion">
            <form class="formConnexion" method="post" action="index.php?action=connexion">
                <h2 class="titleConnexion">Connexion</h2>
                <input class="inputCo" type="text" id="pseudo" placeholder="Pseudo" name="pseudo"><br>
                <input class="inputCo" type="password" id="password" name="password" placeholder="Mot de passe"><br>
                <input class="bouton2" type="submit" value="Connexion" id="submit" name="Connexion">
                <p class="retour"><a href="index.php">Retourner à la page d'accueil</a> </p>
            </form>
        </div>

    </section>
</body>
</html>
