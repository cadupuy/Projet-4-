<?php session_start(); ?>

<!doctype html>
<html lang="fr">
  <head>
      <title><?= $titre ?></title>   <!-- Élément spécifique -->
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="Contenu/style.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">


  </head>
  <body>
          <header>
<a href="index.php"><img class="logo" src="https://cdn.shopify.com/s/files/1/1683/2271/t/14/assets/logo.png?v=16950063112930216700" alt=""></a>
            <nav>
                <ul>
                    <li class="navigation"><a href="index.php">Home</a></li>
                    <li class="navigation"><a href='index.php?action=vueApropos.php'>À propos</a></li>
                    <?php
                    if (isset($_SESSION['pseudo']))
                    {
                        echo '<li class="navigation"><a href="index.php?action=deconnexion">Deconnexion</a></li>';
                        echo '<li class="navigation"><a href="#">Administration</a></li>';
                    }
                    else {
                        echo '<li class="navigation"><a href="index.php?action=vueConnexion"><h1 id="titreBlog">Connexion</h1></a></li>';

                    }?>
                </ul>
            </nav>

          </header>
              <?= $contenu ?>   <!-- Élément spécifique -->
          <section class="footer">


              <div class="global2">
                  <div class="bloc3">
                      <h2 class="index2">Restez vif.</h2>
                      <p>Parce que chez nous, ça va vite. Alors pour participer à la création des prochaines pépites de votre vestiaire, et ne pas rater le lancement que vous attendez, c’est par là :</p>
                      <form class="formulaire" action="index.html" method="post">
                          <input class="input1" type="email" name="email" placeholder="Votre email ici" required>
                          <button class="bouton2" type="submit" name="button">Plus rien ne m'échappe ›</button>
                      </form>
                  </div>
              </div>
              <div class="suivez">
                  <div class="footer1">
                      <h2 class="sui">SUIVEZ-NOUS</h2>
                      <hr>
                      <li class="text">CGV </li>
                      <li class="text">Données</li>
                      <li class="text">Cookies</li>
                  </div>
                  <div class="footer1">
                      <h2 class="sui">VOUS & NOUS</h2>
                      <hr>
                      <li class="text">CGV </li>
                      <li class="text">Données</li>
                      <li class="text">Cookies</li>
                  </div>
              </div>
              <img class="logo2" src="logo.webp" alt="">

          </section>
    </div>
  </body>
</html>
