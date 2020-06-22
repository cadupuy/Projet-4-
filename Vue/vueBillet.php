
<?php $titre = "Mon Blog - " . $billet['titre'];?>

<?php ob_start();?>

<section class="enteteArticle2">
    <ul class="debutArticle">
    <li class="auteurArticles">JEAN FORTEROCHE</li>
    <li><time><?=$billet['date']?></time></li>
    </ul>
    <h2 class="titreblog"><?=$billet['titre']?></h2>
    <h3 class="courtdescriptif">A Lightweight Branding Exercise for Startups</h3>

    <img class="imageblog" src="<?=$billet['fond']?>" alt="">

</section>

<section class="contenuBillet">

<p class="contenuBillets">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia similique dolorum aperiam nihil qui itaque, aut dolorem dignissimos possimus pariatur quasi deserunt odit unde laudantium est, recusandae non magnam consectetur animi? Culpa expedita aut, nesciunt, odio aspernatur animi est quasi sint doloremque aperiam soluta. Repellat modi quibusdam facere ipsum culpa, voluptatem commodi a possimus sint? Possimus quisquam at qui a ex obcaecati maxime animi, nobis provident nostrum mollitia ipsam, libero odit. Ut animi, beatae officia ea saepe tempora vero adipisci voluptatibus aspernatur consequuntur suscipit culpa at cupiditate fugit. Modi est cumque minus, blanditiis recusandae incidunt culpa sed dolore totam repudiandae.</p>
</section>
<div class="iconesArticle">
<li class='partager'>Partager:</li>
<li class='fb'>FACEBOOK</li>
<li class="twit">TWITTER</li>
<li class='link'>LIKEDIN</li>
<li class='insta'>INSTAGRAM</li>
      </div>

      <div class="articleCoupCoeur">
          <img src="contenu/images/banniere.png" alt="" class="banniere">
          <h3 class="coupcoeur">CHAPITRE COUP DE COEUR</h3>
          <h2 class='articlesuivant'>Un article qui a beaucoup de flow</h2>
          <img src="contenu/images/banniere.png" alt="" class="banniere2">

      </div>

<section class="enteteCommentaire">
    <h2 class="commentaires">Commentaires</h2>
</section>

<?php foreach ($commentaires as $commentaire): ?>
<div class="listeCommentaires">
        <img class="avatar2"src="contenu/images/empty.png" alt="">
        <div class="contenuMessage">
        <p class='auteur'><?=$commentaire['auteur']?></p> <br>
        <p class="invite">Invité</p>
            <p class='contenu'><?=$commentaire['contenu']?></p>
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
     <label class="label1" for="txtCommentaire">Message</label><br>
     <textarea class='formulairecommentaire1'id="txtCommentaire" name="contenu" rows="4"
        placeholder="Votre commentaire ici..." required></textarea><br />
        <label class="label2" for="auteur">Pseudo</label><br>
    <input class='formulairecommentaire2'id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required><br />
     <label class="label3" for="email">E-mail</label><br>
    <input class='formulairecommentaire3'id="email" name="email" type="email" placeholder="Votre e-mail" required>
        <input class='formulairecommentaire' type="hidden" name="id" value="<?=$billet['id']?>">
        <input class="boutonCom" type="submit" value="ENVOYER">

</form>
</div>


<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>
