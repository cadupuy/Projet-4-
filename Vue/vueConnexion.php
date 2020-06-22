<?php session_start();?>

<!doctype html>
<html lang="fr">
  <head>
      <title>Connexion</title>   <!-- Élément spécifique -->
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="Contenu/style.css"/>


      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script src="https://kit.fontawesome.com/22878924ef.js" crossorigin="anonymous"></script>
      <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
  </head>
  <body>

<section class="fondco">

<div class="formulaireConnexion">
<h2 class="titleConnexion">Connexion</h2>


<form class="formConnexion" method="post" action="index.php?action=connexion">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input class="bouton2" type="submit" value="Connexion" id="submit" name="Connexion">
    </form>
</div>

</section>
  </body>
  </html>
