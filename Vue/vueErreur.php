<?php $titre = 'Mon Blog';?>
<?php session_start();?>

<?php ob_start()?>


    <div class="erreur">
        <h2 class="oups">OUPS!</h2>
        <p class="texterreur"><?=$msgErreur?></p>
        <a href="index.php" class="backhome">RETOUR À L'ACCUEIL</a>
    </div>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>
