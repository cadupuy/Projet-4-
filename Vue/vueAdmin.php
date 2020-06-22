


<?php $titre = 'Administration';?>

<?php ob_start();?>

<section class="dashboard">

<a class="boutonDashboard" href="index.php?action=ajouterArticle">Ajouter un article ›</a>

<h2 class="titre1Dashboard">Ensemble de vos articles</h2>



<table class="ensembleBillets">
  <tr>
    <td>Titre</td>
    <td>Date</td>
  </tr>
  <?php foreach ($billets as $billet): ?>

  <tr>
    <td><?=$billet['titre']?></td>
    <td><?=$billet['date']?></td>
    <td><a href="<?="index.php?action=modifierArticle&id=" . $billet['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
   <td> <a href="<?="index.php?action=delete&id=" . $billet['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
  </tr>
  <?php endforeach;?>

</table>

<h2 class="titre2Dashboard">Commentaires signalés</h2>

<table class='ensembleCommentaires'>
  <tr>
    <td>Auteur</td>
    <td>Message</td>
  </tr>

  <?php foreach ($commentaires as $commentaire): ?>

  <tr>
    <td><?=$commentaire['auteur']?></td>
    <td><?=$commentaire['contenu']?></td>
    <td><a href="<?="index.php?action=validerCom&id=" . $commentaire['id']?>">Valider</a></td>
    <td> <a href="<?="index.php?action=deleteCom&id=" . $commentaire['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
  </tr>

  <?php endforeach;?>

</table>

</section>


<?php $contenu = ob_get_clean();?>
<?php require 'Vue/gabaritAdmin.php';?>
