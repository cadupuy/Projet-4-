
<?php $titre = 'Mon Blog'; ?>

<?php ob_start(); ?>
  <article>

      <section class="proposition">
          <section class="proposition">

              <div class="global1">
                  <div class="bloc1">
                      <h2 class="index">01.Prototype</h2>
                      <p>Tout commence par le questionnaire. Vous participez à la créa des sapes qui vous font de l'oeil. Vos réponses donnent la marche à suivre.</p>
                  </div>
                  <img class="image3" src="https://cdn.shopify.com/s/files/1/1683/2271/files/about-2020-4_2048x.jpg?v=13955856936264961329" alt="imagetest">
              </div>
      </section>

  </article>
  <hr />
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
