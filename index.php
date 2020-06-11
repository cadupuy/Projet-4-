<?php

require 'Controleur/controleur.php';
try {
    if (isset($_GET['action'])) {

        // ACTION POUR OBTENIR LES BILLETS
        if ($_GET['action'] == 'billet') {
            if (isset($_GET['id'])) {
                $idBillet = intval($_GET['id']);
                if ($idBillet != 0) {
                    billet($idBillet);
                } else {
                    throw new Exception("Identifiant de billet non valide");
                }

            } else {
                throw new Exception("Identifiant de billet non défini");
            }

        }

        //  ACTION POUR COMMENTER UN ARTICLE
        else if ($_GET['action'] == 'commenter') {
            $auteur = getParametre($_POST, 'auteur');
            $contenu = getParametre($_POST, 'contenu');
            $idBillet = getParametre($_POST, 'id');
            commenter($auteur, $contenu, $idBillet);

        }

        //  ACTION POUR SIGNALER UN COMMENTAIRE
        else if ($_GET['action'] == 'signalerCommentaire') {
            $sigaler = getParametre($_POST, 'signaler');
            signalerCommentaires($signaler);

        }

        // ACTION POUR SE CONNECTER
        else if ($_GET['action'] == 'login') {

            require 'Vue/vueConnexion.php';
        } else if ($_GET['action'] == 'connexion') {

            authentification($_POST['pseudo'], $_POST['password']);

        }

        // ACTION POUR ACCÉDER À LA PAGE À PROPOS
        else if ($_GET['action'] == 'about') {

            require 'Vue/vueApropos.php';

        }

        // ACTION POUR ACCÉDER À LA PAGE D'AJOUT D'ARTICLE
        else if ($_GET['action'] == 'ajouterArticle') {

            require 'Vue/vueAjoutBillet.php';

        }

        // ACTION POUR ACCÉDER À LA PAGE DE MODIFICATION D'UN ARTICLE
        else if ($_GET['action'] == 'modifierArticle') {
            $idBillet = getParametre($_GET, 'id');
            changerArticle($idBillet);

        }

        // ACTION POUR MODIFIER UN ARTICLE EXISTANT

        else if ($_GET['action'] == 'modificationBillet') {
            $idBillet = getParametre($_GET, 'id');
            $titre = getParametreModif($_POST, 'titre');
            $contenu = getParametreModif($_POST, 'contenu');
            modifierArticle($titre, $contenu, $idBillet);
        }

        // ACTION POUR POSTER LE NOUVEL ARTICLE

        else if ($_GET['action'] == 'ajoutBillet') {
            $titre = getParametreAjout($_POST, 'titre');
            $contenu = getParametreAjout($_POST, 'contenu');
            ajouterArticle($titre, $contenu);

        }

        // ACTION POUR ARRIVER SUR LA PAGE ADMINISTRATION
        else if ($_GET['action'] == 'admin') {

            admin();

        }

        // ACTION POUR SUPPRIMER UN BILLET
        else if ($_GET['action'] == 'delete') {
            $idBillet = getParametre($_GET, 'id');
            supprimer($idBillet);

        }

        // ACTION POUR SE DÉCONNECTER
        else if ($_GET['action'] == 'logout') {

            logout();

        } else {
            throw new Exception("Action non valide");
        }

    }

    // DÉFINITION DE L'ACTION PAR DÉFAULT
    else {
        accueil();
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
