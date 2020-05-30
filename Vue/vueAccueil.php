

<?php $titre = 'Mon Blog'; ?>

<?php ob_start(); ?>
<div class="accueil">



<?php foreach ($billets as $billet): ?>
  <article class="ensembleArticles">
      <img class="image1" src="<?= $billet['accueil'] ?>" alt="imagetest">
      <time class="dateArticle"><?= $billet['date'] ?></time>
          <div class="global1">
              <div class="bloc1">
                  <p class="accroche"><?= $billet['description'] ?></p>

                <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                        <h2 class="index"><?= $billet['titre'] ?></h2>
                    </a></h2>
                    <p class="extrait"><?= substr($billet['contenu'], 0, 130);?>...</p>
                <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>"><img class="fleche2" src="https://cdn.shopify.com/s/files/1/1683/2271/t/14/assets/ico-go-to-post-arrow.svg?v=12751247677418604050" alt=""></a>
              </div>
          </div>
  </article>
<?php endforeach; ?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
