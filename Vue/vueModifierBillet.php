
<?php $titre = 'Modifier un article';?>
<?php ob_start();?>
<?php $billets = $billet?>

    <form method="post" action="<?="index.php?action=modificationBillet&id=" . $billet['id']?>">
      <input type="text" id="titre" name="titre" value="<?=$billet['titre']?>"><br>
      <textarea id="mytextarea" name="contenu"><?=$billet['contenu']?></textarea>
      <input class="bouton2" type="submit" value="Modifier ›" id="submit" name="ajoutBillet ›">

    </form>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>