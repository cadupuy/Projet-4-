<?php


require 'Modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
  $modele = new Modele();
  $billets = $modele->getBillets();
  require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
  $modele = new Modele();
  $billet = $modele->getBillet($idBillet);
  $commentaires = $modele->getCommentaires($idBillet);
  require 'Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require 'Vue/vueErreur.php';
}

function commenter($auteur, $contenu, $idBillet) {
  $modele = new Modele();
  $billet = $modele->getBillet($idBillet);
  $commenter = $modele->ajouterCommentaire($auteur, $contenu, $idBillet);
  if ($commenter){
      header('Location: index.php?action=billet&id=' . $billet["id"]);

  }
  // Actualisation de l'affichage du billet
  require 'Vue/vueBillet.php';
}

function getParametre($tableau, $nom) {
   if (isset($tableau[$nom])) {
     return $tableau[$nom];
   }
   else {
       throw new Exception("Paramètre '$nom' absent");
   }
}

 function authentification($pseudo, $resultat) {

    $modele = new Modele();
    $user = $modele->getUser($pseudo);
    var_dump($user);
    $isPasswordCorrect = password_verify($resultat, password_hash($user['pass'], PASSWORD_DEFAULT));

    if ($isPasswordCorrect){
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
        header('Location: index.php');
    }

    else {
        echo 'Mauvais identifiant ou mot de passe !';
        require 'Vue/vueConnexion.php';

    }
}
