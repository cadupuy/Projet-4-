

<?php $titre = "Connexion";?>

<?php ob_start();?>


<section class="connexion">
    <h2 class="bioTitre">Connexion</h2>

    <div class="formulaireConnexion">
        <form class="formConnexion" method="post" action="index.php?action=connexion">

         <label class="label" for="pseudo">Pseudo٭</label><br>
         <input class="formulairecontact" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required><br>

         <label class="label" for="password">Mot de passe٭</label><br>
         <input class="formulairecontact" type="password" id="password" name="password" placeholder="Mot de passe" required><br>
         <input class="boutonConnexion" type="submit" value="CONNEXION" id="submit" name="Connexion">
        </form>
    </div>

</section>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>
