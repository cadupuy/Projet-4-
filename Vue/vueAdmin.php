
<?php $titre = 'Administration';?>

<?php ob_start();?>

<a class="bouton3" href="index.php?action=ajouterArticle">Ajouter un article ›</a>

<h2>Ensemble de vos articles</h2>
<table>
  <tr>
    <td>Titre</td>
    <td>Date</td>
  </tr>
  <?php foreach ($billets as $billet): ?>

  <tr>
    <td><?=$billet['titre']?></td>
    <td><?=$billet['date']?></td>
    <td><a href="<?="index.php?action=modifierArticle&id=" . $billet['id']?>">Modifier</a></td>
    <td><a href="<?="index.php?action=delete&id=" . $billet['id']?>">Supprimer</a></td>
  </tr>
  <?php endforeach;?>

</table>

<h2>Commentaires signalés</h2>

<table>

  <?php foreach ($billets as $billet): ?>

  <tr>
    <td><?=$commentaire['auteur']?></td>
    <td><?=$commentaire['message']?></td>
    <td><a href="<?="index.php?action=deleteCom&id=" . $commentaire['id']?>">Supprimer</a></td>
  </tr>
  <?php endforeach;?>

</table>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>