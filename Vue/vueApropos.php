<?php session_start();?>

<?php $titre = 'Mon Blog';?>

<?php ob_start();?>
    <section class="biographie">
        <h2 class="bioTitre">Biographie</h2>
        <img class="fondabout1" src="contenu/images/bio.jpg" alt="">
        <p class="titreCourt">JE SUIS AVENTURIER ET ÉCRIVAIN</p>
        <h2 class="titreBio">Billets pour<br>l'Alaska</h2>
        <div class="textGlobal">
            <div class="partie1">
                <p class="desc2">
                <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren. et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
            </div>
            <div class="partie2">
                <p class="desc2">
                <p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren. et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
            </div>
        </div>
        <div>
            <h2 class="finabout">JEAN FORTEROCHE - AUTEUR</h2>
        </div>
    </section>
<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>
