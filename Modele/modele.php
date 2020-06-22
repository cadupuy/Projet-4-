<?php

class Modele
{
// Effectue la connexion à la BDD
    protected function getBdd()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet 4;charset=utf8',
            'root', 'root');
        return $bdd;
    }
}
