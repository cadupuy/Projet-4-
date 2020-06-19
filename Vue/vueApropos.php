
<?php $titre = 'Mon Blog';?>

<?php ob_start();?>
    <section class="biographie">
        <h2 class="bioTitre">Biographie</h2>
        <img class="fondabout1" src="contenu/images/bio.jpg" alt="">
        <p class="titreCourt">I AM DESIGNER AND DEVELOPER</p>
        <h2 class="titreBio">Welcome de <br> Code Studio</h2>
        <div class="textGlobal">
            <div class="partie1">
                <p class="description">
                <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren. et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
            </div>
            <div class="partie2">
                 <p class="description">
                 <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren. et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
            </div>
        </div>
        <div>
            <h2 class="finabout">CABE DEO - CEO OF CABE STUDIO</h2>
        </div>
    </section>
<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>
