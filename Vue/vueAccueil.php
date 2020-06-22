<?php session_start();?>

<!doctype html>
<html lang="fr">
  <head>
      <title>Accueil</title>   <!-- Élément spécifique -->
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="Contenu/style.css"/>


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
        <div class="accueil">
        <a href="index.php">
    <div>
                 <img class="avatar" src="contenu/images/jf.jpg" alt="">
             </div></a>
             <div class="blockDescription">
                   <h1 class="titre">Jean <br>  Forteroche</h1>
                   <p class="description">Retrouvez toutes les histoires <br> de mon périple en Alaksa.</p>
                   <img class="icones" src="contenu/images/icon-img.png" alt="">
             </div>
        </div>
    </header>


            <nav class="nav">
                <hr class="hr1">
                <img class="logo2" src="contenu/images/logo-2.png" alt="">
                <ul class="ulNav">
                    <li class="navigationHome"><a href="index.php">ACCUEIL</a></li>
                    <li class="navigation"><a href='index.php?action=about'>BIOGRAPHIE</a></li>
                    <li class="navigation"><a href='index.php?action=about'>CONTACT</a></li>
                    <?php
if (isset($_SESSION['pseudo'])) {
    echo '<li class="navigation"><a href="index.php?action=logout">DECONNEXION</a></li>';
    echo '<li class="navigation"><a href="index.php?action=admin">ADMINISTRATION</a></li>';
} else {
    echo '<li class="navigation"><a href="index.php?action=login">CONNEXION</a></li>';
}?>
            <i class="fas fa-search"></i>

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
    <p class="extraitArticle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quo quisquam ullam molestias harum esse rerum ducimus voluptate ad quis iure aspernatur nisi saepe, perspiciatis dolore.</p>
  </div>

  <div class="piedArticle">
      <img class="barre" src="Contenu/images/barre.png" alt="">
      <a href="index.php?action=billet&id=<?=$billet['id']?>">
<p class="lirePlus">Lire Plus</p></a>
      <p class="share">Partager</p>
      <i class="fab fa-facebook-square"></i>
      <i class="fas fa-heart"></i>
      <i class="fab fa-linkedin"></i>
      <i class="fab fa-twitter-square"></i>

</div>
</article>
<?php endforeach;?>

<section class="globalFooter">
          <div class="footer">
    <div class="menuFooter1">
          <h2 class="nomFooter">Jean <br>Forteroche.</h2>
    </div>
    <div class="menuFooter2">
          <ul>
                    <li class="liFooter0"><a href="index.php">Accueil</a></li>
                    <li class="liFooter0"><a href='index.php?action=about'>Biographie</a></li>


</ul>

                    </div>
                    <div class="menuFooter3">
                        <ul>
                    <?php
if (isset($_SESSION['pseudo'])) {
    echo '<li class="liFooter0"><a href="index.php?action=logout">Déconnexion</a></li>';
    echo '<li class="liFooter0"><a href="index.php?action=admin">Administration</a></li>';
} else {
    echo '<li class="liFooter0"><a href="index.php?action=login">Connexion</a></li>';
}?>
   <li class="liFooter0"><a href='index.php?action=about'>Contact</a></li></ul></div>




</div>

          <div class="piedDePage">
            <div class="pied1">
                <ul>
                <i class="fab fa-facebook-square"></i>
      <i class="fas fa-heart"></i>
      <i class="fab fa-linkedin"></i>
      <i class="fab fa-twitter-square"></i>
          </ul>
            </div>
            <div class="pied2">
                <p class="ca">© 2020 Charles-Antoine Dupuy 2020</p>
            </div>
</div>
</section>
<script src="Contenu/signale.js"></script>

</body>
</html>


