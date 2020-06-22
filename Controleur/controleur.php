<?php
require_once 'Modele/modeleBillets.php';
require_once 'Modele/modeleCommentaires.php';
require_once 'Modele/modeleUtilisateur.php';

// Affiche la liste de tous les billets du blog
function accueil()
{
    $modeleBillets = new BilletsManager();
    $billets = $modeleBillets->getBillets();
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet)
{
    $modeleCommentaires = new CommentairesManager();
    $modeleBillets = new BilletsManager();
    $billet = $modeleBillets->getBillet($idBillet);
    $commentaires = $modeleCommentaires->getCommentaires($idBillet);
    require 'Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur)
{
    require 'Vue/vueErreur.php';
}

// Ajouter un commentaire
function commenter($auteur, $contenu, $idBillet)
{
    $modeleCommentaires = new CommentairesManager();
    $modeleBillets = new BilletsManager();
    $billet = $modeleBillets->getBillet($idBillet);
    $commenter = $modeleCommentaires->ajouterCommentaire($auteur, $contenu, $idBillet);
    if ($commenter) {
        header('Location: index.php?action=billet&id=' . $billet["id"]);

    } else {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }

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

    $modeleUtilistateur = new UtilisateurManager();
    $user = $modeleUtilistateur->getUser($pseudo);
    $isPasswordCorrect = password_verify($resultat, $user['pass']);

    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        header('Location: index.php');
    } else {
        throw new Exception("Mauvais identifiant ou mot de passe !");

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
    $modeleBillets = new BilletsManager();
    $modeleCommentaires = new CommentairesManager();
    $commentaires = $modeleCommentaires->getCommentaire();
    $billets = $modeleBillets->getBillets();
    require 'Vue/vueAdmin.php';
}

// Supprime les données liées à un billets de la bdd
function supprimer($idBillet)
{
    $modeleBillets = new BilletsManager();
    $billet = $modeleBillets->getBillet($idBillet);
    $supprimer = $modeleBillets->deleteBillet($idBillet);
    if ($supprimer) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage
    throw new Exception('Impossible de supprimer l\'article');

}

// Affiche la page pour ajouter un billet
function ajoutArticle()
{
    require 'Vue/vueAjoutBillet.php';
}

// Affiche un nouveau billet
function ajouterArticle($titre, $contenu)
{
    $modeleBillets = new BilletsManager();
    $ajouter = $modeleBillets->ajouterBillet($titre, $contenu);
    if ($ajouter) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage du billet
    throw new Exception('Impossible d\'ajouter l\'article');
}

// Affiche la page pour modifier un billet
function changerArticle($idBillet)
{
    $modeleBillets = new BilletsManager();
    $billet = $modeleBillets->getBillet($idBillet);
    require 'Vue/vueModifierBillet.php';
}

// Modifie un billet déjà existant
function modifierArticle($titre, $contenu, $idBillet)
{
    $modeleBillets = new BilletsManager();
    $modifier = $modeleBillets->modifierBillet($titre, $contenu, $idBillet);
    if ($modifier) {
        header('Location: index.php?action=admin');

    }
    throw new Exception('Impossible de modifier le billet !');

}

// Affiche le signalement d'un commentaire
function signalerCommentaires($idBillet, $idCommentaire)
{
    $modeleCommentaires = new CommentairesManager();
    $commentaires = $modeleCommentaires->getCommentaire();
    $commentaire = $modeleCommentaires->getCommentaires($idBillet);
    $signaler = $modeleCommentaires->commentaireSignale($idCommentaire);
    if ($signaler) {
        echo $idBillet . " " . $idCommentaire;
        // header('Location: index.php?action=billet&id=' . $idBillet);

    } else {
        throw new Exception('Le commentaire n\'a pas été signalé');
    }
}

// Supprime les données liées à un commentaire de la bdd
function supprimerCommentaire($idCommentaire)
{
    $modeleCommentaires = new CommentairesManager();
    $commentaire = $modeleCommentaires->getCommentaire();
    $supprimer = $modeleCommentaires->deleteCommentaire($idCommentaire);
    if ($supprimer) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage
    require 'Vue/vueAdmin.php';
}

// Valide un commentaire dans le panneau d'administration
function validerCommentaire($idCommentaire)
{
    $modeleCommentaires = new CommentairesManager();
    $commentaire = $modeleCommentaires->getCommentaire();
    $valider = $modeleCommentaires->commentaireValide($idCommentaire);
    if ($valider) {
        header('Location: index.php?action=admin');

    }
    // Actualisation de l'affichage
    throw new Exception('Impossible de supprimer le commentaire !');
}

// Ajoute un utilisateur à la base de données
function utilisateur($pseudo, $pass)
{
    $modeleUtilistateur = new UtilisateurManager();
    $utilisateur = $modeleUtilistateur->ajouterUtilisateur($pseudo, $pass);
    if ($utilisateur) {
        header('Location: index.php?action=inscription');

    }
    // Actualisation de l'affichage
    throw new Exception('Impossible d\'ajouter l\'utilisateur');
}
