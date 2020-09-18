<?php

namespace OpenClassrooms\Blog\Controleur; // La classe sera dans ce namespace

require_once 'Modele/modeleBillets.php';
require_once 'Modele/modeleCommentaires.php';
require_once 'Modele/modeleUtilisateur.php';
require_once 'Config/vue.php';

class Controleur
{
    private $modeleBillets;
    private $modeleCommentaires;
    private $modeleUtilistateur;

    public function __construct()
    {
        $this->modeleBillets = new \OpenClassrooms\Blog\Modele\BilletsManager();
        $this->modeleCommentaires = new \OpenClassrooms\Blog\Modele\CommentairesManager();
        $this->modeleUtilisateur = new \OpenClassrooms\Blog\Modele\UtilisateurManager();
    }

    // Affiche la liste de tous les billets du blog
    public function accueil()
    {
        $billets = $this->modeleBillets->getBillets();
        require 'Vue/vueAccueil.php';

    }

    // Affiche les détails sur un billet
    public function billet($idBillet)
    {
        $billet = $this->modeleBillets->getBillet($idBillet);
        $commentaires = $this->modeleCommentaires->getCommentaires($idBillet);
        $vue = new \OpenClassrooms\Blog\Vue\Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajouter un commentaire
    public function commenter($auteur, $contenu, $idBillet)
    {
        $billet = $this->modeleBillets->getBillet($idBillet);
        $commenter = $this->modeleCommentaires->ajouterCommentaire($auteur, $contenu, $idBillet);
        if ($commenter) {
            header('Location: index.php?action=billet&id=' . $billet["id"]);

        } else {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        }

    }
    public function authentification($pseudo, $resultat)
    {

        $user = $this->modeleUtilisateur->getUser($pseudo);
        $isPasswordCorrect = password_verify($resultat, $user['pass']);

        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            header('Location: index.php');
        } else {
            throw new \Exception("Mauvais identifiant ou mot de passe !");

        }
    }

    // Affiche la page à propos
    public function apropos()
    {
        $vue = new \OpenClassrooms\Blog\Vue\Vue("Apropos");
        $vue->generer(array());
    }

    // Clotûre la session
    public function logout()
    {
        session_start();
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        header('Location: index.php');
    }

    // Affiche la page d'administration
    public function admin()
    {
        $commentaires = $this->modeleCommentaires->getCommentaire();
        $billets = $this->modeleBillets->getBillets();
        $vue = new \OpenClassrooms\Blog\Vue\Vue("Admin");
        $vue->generer(array('billets' => $billets, 'commentaires' => $commentaires));
    }

    // Supprime les données liées à un billets de la bdd
    public function supprimer($idBillet)
    {
        $billet = $this->modeleBillets->getBillet($idBillet);
        $supprimer = $this->modeleBillets->deleteBillet($idBillet);
        $supprimer = $this->modeleBillets->deleteBilletCom($idBillet);
        if ($supprimer) {
            header('Location: index.php?action=admin');

        }
        // Actualisation de l'affichage
        throw new \Exception('Impossible de supprimer l\'article');

    }

    // Affiche la page pour ajouter un billet
    public function ajoutArticle()
    {
        $vue = new \OpenClassrooms\Blog\Vue\Vue("AjoutBillet");
        $vue->generer(array());
    }

    // Affiche un nouveau billet
    public function ajouterArticle($titre, $accueil, $contenu)
    {
        $ajouter = $this->modeleBillets->ajouterBillet($titre, $accueil, $contenu);
        if ($ajouter) {
            header('Location: index.php?action=admin');

        }
        // Actualisation de l'affichage du billet
        throw new \Exception('Impossible d\'ajouter l\'article');
    }

    // Affiche la page pour modifier un billet
    public function changerArticle($idBillet)
    {
        $billet = $this->modeleBillets->getBillet($idBillet);
        $vue = new \OpenClassrooms\Blog\Vue\Vue("ModifierBillet");
        $vue->generer(array('billet' => $billet));
    }

    // Modifie un billet déjà existant
    public function modifierArticle($titre, $image, $contenu, $idBillet)
    {
        $modifier = $this->modeleBillets->modifierBillet($titre, $image, $contenu, $idBillet);
        if ($modifier) {
            header('Location: index.php?action=admin');

        }
        throw new \Exception('Impossible de modifier le billet !');

    }

    // Affiche le signalement d'un commentaire
    public function signalerCommentaires($idBillet, $idCommentaire)
    {
        $commentaires = $this->modeleCommentaires->getCommentaire();
        $commentaire = $this->modeleCommentaires->getCommentaires($idBillet);
        $signaler = $this->modeleCommentaires->commentaireSignale($idCommentaire);
        if ($signaler) {
            header('Location: index.php?action=billet&id=' . $idBillet);

        } else {
            throw new \Exception('Le commentaire n\'a pas été signalé');
        }
    }

    // Supprime les données liées à un commentaire de la bdd
    public function supprimerCommentaire($idCommentaire)
    {
        $commentaire = $this->modeleCommentaires->getCommentaire();
        $supprimer = $this->modeleCommentaires->deleteCommentaire($idCommentaire);
        if ($supprimer) {
            header('Location: index.php?action=admin');

        }
        // Actualisation de l'affichage
        $vue = new \OpenClassrooms\Blog\Vue\Vue("Admin");
        $vue->generer(array());

    }

    // Valide un commentaire dans le panneau d'administration
    public function validerCommentaire($idCommentaire)
    {
        $commentaire = $this->modeleCommentaires->getCommentaire();
        $valider = $this->modeleCommentaires->commentaireValide($idCommentaire);
        if ($valider) {
            header('Location: index.php?action=admin');

        }
        // Actualisation de l'affichage
        throw new \Exception('Impossible de supprimer le commentaire !');
    }

    // Ajoute un utilisateur à la base de données
    public function utilisateur($pseudo, $pass)
    {
        $utilisateur = $this->modeleUtilistateur->ajouterUtilisateur($pseudo, $pass);
        if ($utilisateur) {
            header('Location: index.php?action=inscription');

        }
        // Actualisation de l'affichage
        throw new \Exception('Impossible d\'ajouter l\'utilisateur');
    }

}
