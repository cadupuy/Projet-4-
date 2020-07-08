
<?php $titre = 'Ajouter un article';?>

<?php ob_start();?>

<section class='ajoutadmin'>

  <form class="ajoutbillet" method="post" action="index.php?action=ajoutBillet">
      <input class="titreajout" type="text" id="titre" name="titre" placeholder="Titre de l'article"><br>
      <input class="imageajout" type="text" id="image" name="image" placeholder="Lien url de l'image de couverture"><br>
      <textarea id="mytextarea" name="contenu" placeholder="Contenu de l'article"></textarea>
      <input class="boutonAjout" type="submit" value="AJOUTER" id="submit" name="ajoutBillet ›">
  </form>
</section>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>