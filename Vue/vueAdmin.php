


<?php $titre = 'Administration';?>

<?php ob_start();?>


<!-- <?php
// penser à mettre "or" au lieu de "and"
// if (!isset($_SESSION['pseudo'])) {
//     //rediriger l'utilisateur vers la page d'accueil
//     header("Location: index.php");
// } else {
//     exit;

// }
?> -->





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
  <tr>
    <td>Auteur</td>
    <td>Message</td>
  </tr>

  <?php foreach ($commentaires as $commentaire): ?>

  <tr>
    <td><?=$commentaire['auteur']?></td>
    <td><?=$commentaire['contenu']?></td>
    <td><a href="<?="index.php?action=validerCom&id=" . $commentaire['id']?>">Valider</a></td>
    <td><a href="<?="index.php?action=deleteCom&id=" . $commentaire['id']?>">Supprimer</a></td>
  </tr>

  <?php endforeach;?>

</table>

<?php $contenu = ob_get_clean();?>
<?php require 'Vue/gabarit.php';?>
