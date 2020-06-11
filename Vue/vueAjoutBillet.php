
<?php $titre = 'Ajouter un article';?>

<?php ob_start();?>

    <form method="post" action="index.php?action=ajoutBillet">
      <input type="text" id="titre" name="titre"><br>
      <textarea id="mytextarea" name="contenu"></textarea>
      <input class="bouton2" type="submit" value="Ajouter ›" id="submit" name="ajoutBillet ›">

    </form>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>