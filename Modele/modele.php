<?php

class Modele {

    // Renvoie la liste de tous les billets, triés par identifiant décroissant
    public function getBillets() {
        $bdd = $this->getBdd();
        $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,'
        . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
        . ' order by BIL_ID desc');
        return $billets;
    }

    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    private function getBdd() {
        $bdd = new PDO('mysql:host=localhost;dbname=projet 4;charset=utf8',
          'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }

    // Renvoie les informations sur un billet
    public function getBillet($idBillet) {
      $bdd = $this->getBdd();
      $billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
        . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
        . ' where BIL_ID=?');
      $billet->execute(array($idBillet));
      if ($billet->rowCount() == 1)
        return $billet->fetch();  // Accès à la première ligne de résultat
      else
       throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
      $bdd = $this->getBdd();
      $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
        . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
        . ' where BIL_ID=?');
      $commentaires->execute(array($idBillet));
      return $commentaires;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $bdd = $this->getBdd();
        $ajout = $bdd->prepare('insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
          . ' values(NOW(), ?, ?, ?)');
        $ajout->execute(array($auteur, $contenu, $idBillet));
        return $ajout;
    }

}
