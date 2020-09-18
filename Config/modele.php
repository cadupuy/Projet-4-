<?php

namespace OpenClassrooms\Blog\Modele; // La classe sera dans ce namespace

abstract class Modele
{

    /** Objet PDO d'accès à la BD */
    private $bdd;

    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    private function getBdd()
    {
        if ($this->bdd == null) {
            // Création de la connexion
            $this->bdd = new \PDO('mysql:host=localhost;dbname=projet 4;charset=utf8', 'root', 'root',
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

}
