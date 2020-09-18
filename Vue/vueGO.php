<?php $this->titre = "S'inscrire";?>
<?php session_start();?>

<div class="formulaireConnexion">
    <h2 class="titleConnexion">Bonjour !</h2>
    <form class="formConnexion" method="post" action="index.php?action=coco">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="pass" name="pass"><br>
        <input class="bouton2" type="submit" value="Inscription ›" id="submit" name="Inscription ›">
    </form>
</div>
