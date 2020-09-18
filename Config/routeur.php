<?php
namespace OpenClassrooms\Blog\Routeur;

require_once 'Controleur/controleur.php';
require_once 'Config/vue.php';

class Routeur
{

    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new \OpenClassrooms\Blog\Controleur\Controleur();
    }

    // Traite une requête entrante
    public function routerRequete()
    {

        try {
            if (isset($_GET['action'])) {

                // ACTION POUR OBTENIR LES BILLETS
                if ($_GET['action'] == 'billet') {
                    if (isset($_GET['id'])) {
                        $idBillet = intval($this->getParametre($_GET, 'id'));
                        if ($idBillet != 0) {
                            $this->ctrl->billet($idBillet);
                        } else {
                            throw new \Exception("Identifiant de billet non valide");
                        }

                    } else {
                        throw new \Exception("Identifiant de billet non défini");
                    }

                }

                //  ACTION POUR COMMENTER UN ARTICLE
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrl->commenter($auteur, $contenu, $idBillet);

                }

                //  ACTION POUR SIGNALER UN COMMENTAIRE
                else if ($_GET['action'] == 'signalerCommentaire') {
                    $idBillet = $this->getParametre($_GET, 'bilid');
                    $idCommentaire = $this->getParametre($_GET, 'id');
                    $this->ctrl->signalerCommentaires($idBillet, $idCommentaire);
                }

                // ACTION POUR ATTEINDRE LA PAGE CONNEXION
                else if ($_GET['action'] == 'login') {
                    require 'Vue/vueConnexion.php';

                }

                // ACTION POUR SE CONNECTER
                else if ($_GET['action'] == 'connexion') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $resultat = $this->getParametre($_POST, 'password');
                    $this->ctrl->authentification($pseudo, $resultat);

                }

                // ACTION POUR S'INSCRIRE'
                else if ($_GET['action'] == 'coco') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $this->ctrl->utilisateur($pseudo, $pass);

                }

                // ACTION POUR S'INSCRIRE'
                else if ($_GET['action'] == 'inscription') {
                    $vue = new \OpenClassrooms\Blog\Vue\Vue("GO");
                    $vue->generer(array());
                }

                // ACTION POUR ACCÉDER À LA PAGE À PROPOS
                else if ($_GET['action'] == 'about') {
                    $vue = new \OpenClassrooms\Blog\Vue\Vue("Apropos");
                    $vue->generer(array());

                }

                // ACTION POUR ACCÉDER À LA PAGE D'AJOUT D'ARTICLE
                else if ($_GET['action'] == 'ajouterArticle') {

                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $vue = new \OpenClassrooms\Blog\Vue\Vue("AjoutBillet");
                        $vue->generer(array());
                    }

                }

                // ACTION POUR ACCÉDER À LA PAGE DE MODIFICATION D'UN ARTICLE
                else if ($_GET['action'] == 'modifierArticle') {

                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idBillet = $this->getParametre($_GET, 'id');
                        $this->ctrl->changerArticle($idBillet);
                    }

                }

                // ACTION POUR MODIFIER UN ARTICLE EXISTANT

                else if ($_GET['action'] == 'modificationBillet') {

                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idBillet = $this->getParametre($_GET, 'id');
                        $titre = $this->getParametre($_POST, 'titre');
                        $image = $this->getParametre($_POST, 'image');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $this->ctrl->modifierArticle($titre, $image, $contenu, $idBillet);
                    }

                }

                // ACTION POUR POSTER LE NOUVEL ARTICLE

                else if ($_GET['action'] == 'ajoutBillet') {

                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $titre = $this->getParametre($_POST, 'titre');
                        $image = $this->getParametre($_POST, 'image');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $this->ctrl->ajouterArticle($titre, $image, $contenu);
                    }

                }

                // ACTION POUR ARRIVER SUR LA PAGE ADMINISTRATION
                else if ($_GET['action'] == 'admin') {
                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $this->ctrl->admin();

                    }
                }

                // ACTION POUR SUPPRIMER UN BILLET
                else if ($_GET['action'] == 'delete') {

                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idBillet = $this->getParametre($_GET, 'id');
                        $this->ctrl->supprimer($idBillet);
                    }

                }

                // ACTION POUR SUPPRIMER UN COMMENTAIRE
                else if ($_GET['action'] == 'deleteCom') {
                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idCommentaire = $this->getParametre($_GET, 'id');
                        $this->ctrl->supprimerCommentaire($idCommentaire);
                    }

                }

                // ACTION POUR VALIDER UN COMMENTAIRE
                else if ($_GET['action'] == 'validerCom') {

                    session_start();
                    if (!isset($_SESSION['pseudo'])) {
                        //rediriger l'utilisateur vers la page d'accueil
                        header("Location: index.php");

                    } else {
                        $idCommentaire = $this->getParametre($_GET, 'id');
                        $this->ctrl->validerCommentaire($idCommentaire);
                    }

                }

                // ACTION POUR SE DÉCONNECTER
                else if ($_GET['action'] == 'logout') {

                    $this->ctrl->logout();

                } else {
                    throw new \Exception("Action non valide");
                }

            }

            // DÉFINITION DE L'ACTION PAR DÉFAULT
            else {
                $this->ctrl->accueil();
            }
        } catch (\Exception $e) {
            $this->erreur($e->getMessage());
        }

    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new \OpenClassrooms\Blog\Vue\Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new \Exception("Paramètre '$nom' absent");
        }

    }

}
