<?php

require('Controleur/controleur.php');

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'billet') {
      if (isset($_GET['id'])) {
        $idBillet = intval($_GET['id']);
        if ($idBillet != 0)
          billet($idBillet);
        else
          throw new Exception("Identifiant de billet non valide");
      }
      else
        throw new Exception("Identifiant de billet non défini");
    }

    else if ($_GET['action'] == 'commenter') {
       $auteur = getParametre($_POST, 'auteur');
       $contenu = getParametre($_POST, 'contenu');
       $idBillet = getParametre($_POST, 'id');
       commenter($auteur, $contenu, $idBillet);
     }

    else if ($_GET['action'] == 'vueConnexion') {
        require 'Vue/vueConnexion.php';
    }

     else if ($_GET['action'] == 'connexion') {

         authentification($_POST['pseudo'], $_POST['password']);
    
        }
    else
      throw new Exception("Action non valide");
  }

  else {
    accueil();  // action par défaut
  }
}
catch (Exception $e) {
    erreur($e->getMessage());
}
