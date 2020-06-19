<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil()
{
    $modele = new Modele();
    $billets = $modele->getBillets();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet)
{
    $modele = new Modele();
    $billet = $modele->getBillet($idBillet);
    $commentaires = $modele->getCommentaires($idBillet);
    require 'Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur)
{
    require 'Vue/vueErreur.php';
}

// Affiche un commentaire
function commenter($auteur, $contenu, $idBillet)
{
    $modele = new Modele();
    $billet = $modele->getBillet($idBillet);
    $commenter = $modele->ajouterCommentaire($auteur, $contenu, $idBillet);
    if ($commenter) {
        header('Location: index.php?action=billet&id=' . $billet["id"]);

    }
    // Actualisation de l'affichage du billet
    require 'Vue/vueBillet.php';
}

function getParametre($tableau, $nom)
{
    if (isset($tableau[$nom])) {
        return $tableau[$nom];
    } else {
        throw new Exception("Paramètre '$nom' absent");
    }
}

function authentification($pseudo, $resultat)
{

    $modele = new Modele();
    $user = $modele->getUser($pseudo);
    $isPasswordCorrect = password_verify($resultat, $user['pass']);
    // $isPasswordCorrect = password_verify($resultat, password_hash($user['pass'], PASSWORD_DEFAULT));
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
        header('Location: index.php');
    } else {
        throw new Exception("Mauvais identifiant ou mot de passe !");
        require 'Vue/vueConnexion.php';

    }
}

// Affiche la page à propos
function apropos()
{
    require 'Vue/vueApropos.php';
}

// Clotûre la session
function logout()
{
    session_start();
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    header('Location: index.php');

}

// Affiche la page d'administration
function admin()
{
    $modele = new Modele();
    $commentaires = $modele->getCommentaire();
    $billets = $modele->getBillets();
    require 'Vue/vueAdmin.php';
}

// Supprime les données liées à un billets de la bdd
function supprimer($idBillet)
{
    $modele = new Modele();
    $billet = $modele->getBillet($idBillet);
    $supprimer = $modele->deleteBillet($idBillet);
    if ($supprimer) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage
    require 'Vue/vueAdmin.php';
}

// Affiche la page pour ajouter un billet
function ajoutArticle()
{
    require 'Vue/vueAjoutBillet.php';
}

// Affiche un nouveau billet
function ajouterArticle($titre, $contenu)
{
    $modele = new Modele();
    $ajouter = $modele->ajouterBillet($titre, $contenu);
    if ($ajouter) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage du billet
    require 'Vue/vueAdmin.php';
}

// Affiche la page pour modifier un billet
function changerArticle($idBillet)
{
    $modele = new Modele();
    $billet = $modele->getBillet($idBillet);
    require 'Vue/vueModifierBillet.php';
}

// Modifie un billet déjà existant
function modifierArticle($titre, $contenu, $idBillet)
{
    $modele = new Modele();
    $modifier = $modele->modifierBillet($titre, $contenu, $idBillet);
    if ($modifier) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage du billet
    require 'Vue/vueAdmin.php';
}

// Affiche le signalement d'un commentaire
function signalerCommentaires($idbillet, $idCommentaire)
{
    $modele = new Modele();
    $commentaires = $modele->getCommentaire();
    $commentaire = $modele->getCommentaires($idBillet);
    $signaler = $modele->commentaireSignale($idCommentaire);
    if ($signaler) {
        header('Location: index.php?action=billet&id=' . $billet["id"]);

    }
    // Actualisation de l'affichage du billet
    require 'Vue/vueBillet.php';
}

// Supprime les données liées à un commentaire de la bdd
function supprimerCommentaire($idCommentaire)
{
    $modele = new Modele();
    $commentaire = $modele->getCommentaire();
    $supprimer = $modele->deleteCommentaire($idCommentaire);
    if ($supprimer) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage
    require 'Vue/vueAdmin.php';
}

// Valide un commentaire dans le panneau d'administration
function validerCommentaire($idCommentaire)
{
    $modele = new Modele();
    $commentaire = $modele->getCommentaire();
    $valider = $modele->commentaireValide($idCommentaire);
    if ($valider) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage
    require 'Vue/vueAdmin.php';
}

// Ajoute un utilisateur à la base de données
function utilisateur($pseudo, $pass)
{
    $modele = new Modele();
    $utilisateur = $modele->ajouterUtilisateur($pseudo, $pass);
    if ($utilisateur) {
        header('Location: index.php?action=inscription');

    }
    // Actualisation de l'affichage
    require 'Vue/vueGO.php';
}
