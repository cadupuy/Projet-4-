
<?php $titre = "Mon Blog - " . $billet['titre'];?>

<?php ob_start();?>

<section class="enteteArticle2">
    <ul class="debutArticle">
        <li class="auteurArticles">JEAN FORTEROCHE</li>
        <li><time><?=$billet['date']?></time></li>
    </ul>
    <h2 class="titreblog"><?=$billet['titre']?></h2>
    <h3 class="courtdescriptif">Billet simple pour l'Alaska</h3>
    <img class="imageblog" src="<?=$billet['accueil']?>" alt="">
</section>

<section class="contenuBillet">
    <p class="contenuBillets"><?=$billet['contenu']?></p>
</section>
<div class="iconesArticle">
    <li class='partager'>Partager:</li>
    <div class="iconesArticles">
        <li class='fb'>FACEBOOK</li>
        <li class="twit">TWITTER</li>
        <li class='link'>LIKEDIN</li>
        <li class='insta'>INSTAGRAM</li>
    </div>
</div>
<div class="articleCoupCoeur">
    <img src="contenu/images/banniere.png" alt="" class="banniere">
    <h3 class="coupcoeur">MES AVENTURES</h3>
    <h2 class='articlesuivant'><a href="index.php">Billet simple pour l'Alaska</a>
    </h2>
    <img src="contenu/images/banniere.png" alt="" class="banniere2">
</div>

<section class="enteteCommentaire">
    <h2 class="commentaires">Commentaires</h2>
</section>

<?php foreach ($commentaires as $commentaire): ?>
    <div class="listeCommentaires">
        <img class="avatar2"src="contenu/images/empty.png" alt="">
        <div class="contenuMessage">
            <p class='auteur'><?=htmlspecialchars($commentaire['auteur'])?></p> <br>
            <p class='contenu'><?=htmlspecialchars($commentaire['contenu'])?></p>
            <a class="signaler" href="<?="index.php?action=signalerCommentaire&id=" . $commentaire['id'] . "&bilid=" . $billet['id']?>">Signaler</a>
        </div>
    </div>
<?php endforeach;?>
<div class="commenter">
    <div class="entetedescommentaires">
        <img src="contenu/images/banniere.png" alt="" class="banniere3">
        <h2 class="laissercommentaire">Laisser un commentaire</h2>
    </div>
    <form class="bloccommentaire"method="post" action="index.php?action=commenter">
        <div class="champ1">
            <label class="label1" for="txtCommentaire">Message</label><br>
            <textarea class='formulairecommentaire1'id="txtCommentaire" name="contenu" rows="4"
            placeholder="Votre commentaire ici..." required></textarea>
        </div><br />
        <div class="champ1">
            <label class="label2" for="auteur">Pseudo</label><br>
            <input class='formulairecommentaire2'id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required>
        </div><br />
        <div class="champ1">
            <label class="label3" for="email">E-mail</label><br>
            <input class='formulairecommentaire3'id="email" name="email" type="email" placeholder="Votre e-mail" required>
        </div>
        <input class='formulairecommentaire' type="hidden" name="id" value="<?=$billet['id']?>">
        <div class="boutonComs">
            <input class="boutonCom" type="submit" value="ENVOYER">
        </div>
    </form>
</div>

<?php $contenu = ob_get_clean();?>
<?php require 'Vue/gabarit.php';?>
