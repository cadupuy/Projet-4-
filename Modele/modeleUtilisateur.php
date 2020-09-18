<?php

namespace OpenClassrooms\Blog\Modele; // La classe sera dans ce namespace

require_once "Config/modele.php";
class UtilisateurManager extends Modele
{

    public function getUser($pseudo)
    {
        //  Récupération de l'utilisateur et de son pass hashé
        $sql = 'SELECT id, pass FROM users WHERE pseudo = ?';
        $connexion = $this->executerRequete($sql, array($pseudo));
        $resultat = $connexion->fetch();
        return $resultat;

    }

    public function ajouterUtilisateur($pseudo, $pass)
    {
        $sql = 'INSERT into users(pseudo, pass)'
            . ' values(?, ?)';
        $ajout = $this->executerRequete($sql, array($pseudo, $pass));
        return $ajout;
    }

}
