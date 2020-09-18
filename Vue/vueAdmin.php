<?php $this->titre = "Administration";?>

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
                <td class="titreAdmin"><?=$billet['titre']?></td>
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
                <td><?=htmlspecialchars($commentaire['auteur'])?></td>
                <td><?=htmlspecialchars($commentaire['contenu'])?></td>
                <td><a href="<?="index.php?action=validerCom&id=" . $commentaire['id']?>"><i class="fas fa-check"></i></a></td>
                <td> <a href="<?="index.php?action=deleteCom&id=" . $commentaire['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
        <?php endforeach;?>
    </table>
</section>

