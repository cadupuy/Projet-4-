<?php session_start();?>

<!doctype html>
<html lang="fr">
  <head>
      <title>Accueil</title>   <!-- Élément spécifique -->
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="Contenu/style.css"/>
      <meta name="viewport" content="width=device-width" />
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script src="https://kit.fontawesome.com/22878924ef.js" crossorigin="anonymous"></script>
      <script>
            tinymce.init({
            selector: '#mytextarea'
            });
      </script>
  </head>
  <body>
    <header>
    <p id="haut"></p>

        <div class="accueil">
            <div class="avatardiv">
                <a href="index.php"><img class="avatar" src="contenu/images/jf.jpg" alt=""></a>
            </div>
            <div class="blockDescription">
                <h1 class="titre">Jean Forteroche</h1>
                <p class="description">Retrouvez toutes les histoires de mon périple en Alaksa.</p>
                <img class="icones" src="contenu/images/icon-img.png" alt="">
            </div>
        </div>
    </header>
    <nav class="nav">
        <hr class="hr1">
        <ul class="ulNav">
            <li class="navigationHome"><a href="index.php">ACCUEIL</a></li>
            <li class="navigation"><a href='index.php?action=about'>BIOGRAPHIE</a></li>
            <?php
if (isset($_SESSION['pseudo'])) {
    echo '<li class="navigation"><a href="index.php?action=logout">DECONNEXION</a></li>';
    echo '<li class="navigation"><a href="index.php?action=admin">ADMINISTRATION</a></li>';
} else {
    echo '<li class="navigation"><a href="index.php?action=login">CONNEXION</a></li>';
}?>
        </ul>
        <hr class="hr1">
    </nav>
    <?php foreach ($billets as $billet): ?>
        <article class="article">
            <div class="enteteArticle">
                <div class="encartArticle1">
                    <p class="numeroArticle">0<?=$billet['id']?></p>
                    <p class="symboleNumero">N°</p>
                </div>
                <div class="encartArticle2">
                    <a href="index.php?action=billet&id=<?=$billet['id']?>">
                    <h2 class="titreArticle"><?=$billet['titre']?></h2></a>
                    <p class="auteurArticle">Par Jean Forteroche, <?=$billet['date']?></p>
                </div>
            </div>
            <img class="imageFondArticle" src="<?=$billet['accueil']?>" alt="">
            <div class="extrait">
               <?=substr($billet['contenu'], 0, 180);?>
            </div>
            <div class="piedArticle">
                <div class="articleSuivant">
                    <img class="barre" src="Contenu/images/barre.png" alt="">
                    <a href="index.php?action=billet&id=<?=$billet['id']?>">
                    <p class="lirePlus">Lire Plus</p></a>
                </div>
                <p class="share">Partager</p>
                <div class="reseauxsociaux">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fas fa-heart"></i>
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-twitter-square"></i>
                </div>
            </div>
        </article>
    <?php endforeach;?>

    <section class="piedDePage3">
            <div class="listPied">
                <img class="iconesbas" src="contenu/images/bas.png" alt="">
            </div>
            <p class="chad">© 2020 <strong>Charles-Antoine Dupuy</strong></p>
            <p class="copyright">All Rights Reserved.</p>
            <a href="#haut"><p class="haut">HAUT DE PAGE</p></a>
    </section>
<script src="Contenu/signale.js"></script>
</body>
</html>


