
<?php $titre = "Mon Blog - " . $billet['titre'];?>

<?php ob_start();?>
<div class="debutArticle">
    <h2 class="numeroArticle">Article #<?=$billet['id']?></h2>
    <a href="index.php"><img class="fleche" src="https://cdn.shopify.com/s/files/1/1683/2271/t/14/assets/ico-go-back-to-home-arrow.svg?v=11996954895339878186" alt="">
    </a>
</div>

    <article class="entete">

        <img class="imageblog" src="<?=$billet['fond']?>" alt="imagetest">
        <div class="billet">
            <h1 class="titreBillet"><?=$billet['titre']?></h1>
            <time><?=$billet['date']?></time>
        </div>

    </article>

<div class="contenuBillet">
    <p><?=$billet['contenu']?></p>
</div>
<hr class="hrhaut">

<h1 id="titreReponses">ESPACE COMMENTAIRE</h1>
<hr class="hrbas">

<div class="commenter">

     <form method="post" action="index.php?action=commenter">
     <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo"
     required /><br />
     <textarea id="txtCommentaire" name="contenu" rows="4"
        placeholder="Votre commentaire" required></textarea><br />
        <input type="hidden" name="id" value="<?=$billet['id']?>" />
        <input class="bouton2" type="submit" value="Commenter ›" />
    </form>
</div>

    <?php foreach ($commentaires as $commentaire): ?>
<div class="commentaires">
        <div class="notification">
          <img src='https://kitt.lewagon.com/placeholder/users/arthur-littm' class="avatar-large" />
          <div class="notification-content">
            <p><small><?=$commentaire['auteur']?></small></p>
            <p><?=$commentaire['contenu']?></p>
          </div>

          <div class="notification-actions">


          <form method="post" action="index.php?action=signalerCommentaire">
      <input class="fas fa-pencil-alt" type="submit" value="Signaler ›" id="submit" name="signaler">

    </form>
          </div>
        </div>
    </div>
<?php endforeach;?>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>
