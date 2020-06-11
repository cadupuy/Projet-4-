

<?php $titre = "Connexion"; ?>

<?php ob_start(); ?>

<div class="formulaireConnexion">
<h2 class="titleConnexion">Bonjour !</h2>

<form class="formConnexion" method="post" action="index.php?action=connexion">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input class="bouton2" type="submit" value="Connexion ›" id="submit" name="Connexion ›">
    </form>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>
