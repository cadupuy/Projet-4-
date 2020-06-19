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
            $idCommentaire = getParametre($_GET, 'id');
            $idbillet = getParametre($_GET, 'id');
            signalerCommentaires($idbillet, $idCommentaire);
        }

        // ACTION POUR ATTEINDRE LA PAGE CONNEXION
        else if ($_GET['action'] == 'login') {

            require 'Vue/vueConnexion.php';
        }

        // ACTION POUR SE CONNECTER
        else if ($_GET['action'] == 'connexion') {
            $pseudo = getParametre($_POST, 'pseudo');
            $resultat = getParametre($_POST, 'password');
            authentification($pseudo, $resultat);

        }

        // ACTION POUR S'INSCRIRE'
        else if ($_GET['action'] == 'coco') {
            $pseudo = getParametre($_POST, 'pseudo');
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            utilisateur($pseudo, $pass);

        }

        // ACTION POUR S'INSCRIRE'
        else if ($_GET['action'] == 'inscription') {

            require 'Vue/vueGO.php';

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
            $titre = getParametre($_POST, 'titre');
            $contenu = getParametre($_POST, 'contenu');
            modifierArticle($titre, $contenu, $idBillet);
        }

        // ACTION POUR POSTER LE NOUVEL ARTICLE

        else if ($_GET['action'] == 'ajoutBillet') {
            $titre = getParametre($_POST, 'titre');
            $contenu = getParametre($_POST, 'contenu');
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

        // ACTION POUR SUPPRIMER UN COMMENTAIRE
        else if ($_GET['action'] == 'deleteCom') {
            $idCommentaire = getParametre($_GET, 'id');
            supprimerCommentaire($idCommentaire);

        }

        // ACTION POUR VALIDER UN COMMENTAIRE
        else if ($_GET['action'] == 'validerCom') {
            $idCommentaire = getParametre($_GET, 'id');
            validerCommentaire($idCommentaire);

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
