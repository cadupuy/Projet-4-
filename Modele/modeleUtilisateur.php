<?php
require_once "Modele/modele.php";
class UtilisateurManager extends Modele
{

    public function getUser($pseudo)
    {
        //  Récupération de l'utilisateur et de son pass hashé
        $bdd = $this->getBdd();
        $connexion = $bdd->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo');
        // echo $pseudo;
        $connexion->execute(array(
            'pseudo' => $pseudo));
        $resultat = $connexion->fetch();
        return $resultat;

    }

    public function ajouterUtilisateur($pseudo, $pass)
    {
        $bdd = $this->getBdd();
        $ajout = $bdd->prepare('INSERT into users(pseudo, pass)'
            . ' values(?, ?)');
        $ajout->execute(array($pseudo, $pass));
        return $ajout;
    }

}
