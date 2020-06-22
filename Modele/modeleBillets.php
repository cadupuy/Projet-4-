<?php
require_once "Modele/modele.php";
class BilletsManager extends Modele
{

    // Renvoie la liste de tous les billets, triés par identifiant décroissant
    public function getBillets()
    {
        $bdd = $this->getBdd();
        $billets = $bdd->query('SELECT bil_id AS id, bil_date AS date,'
            . ' bil_titre AS titre, bil_contenu AS contenu, bil_imgfond AS fond, bil_imgaccueil as accueil FROM T_BILLET'
            . ' order by BIL_ID desc');
        return $billets;
    }

    // Renvoie les informations sur un billet
    public function getBillet($idBillet)
    {
        $bdd = $this->getBdd();
        $billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu, BIL_IMGFOND as fond, BIL_IMGACCUEIL as accueil from T_BILLET'
            . ' where BIL_ID=?');
        $billet->execute(array($idBillet));
        if ($billet->rowCount() == 1) {
            return $billet->fetch();
        }
        // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        }

    }

    //  Supprime un billet de la base de données
    public function deleteBillet($idBillet)
    {
        // Supprime un billet de la base de données
        $bdd = $this->getbdd();
        $suppression = $bdd->prepare('DELETE FROM `t_billet` WHERE `t_billet`.`BIL_ID` = ?');
        $suppression->execute(array($idBillet));
        return $suppression;
    }

    // Ajoute les données du billet dans la table associée
    public function ajouterBillet($titre, $contenu)
    {
        $bdd = $this->getBdd();
        $ajoutBillet = $bdd->prepare('INSERT into T_BILLET(bil_date, bil_titre, bil_contenu)'
            . ' values(NOW(), ?, ?)');
        $ajoutBillet->execute(array($titre, $contenu));
        return $ajoutBillet;
    }

    // Modifie les données du billet dans la table associée
    public function modifierBillet($titre, $contenu, $idBillet)
    {
        $bdd = $this->getBdd();
        $modifierBillet = $bdd->prepare('UPDATE t_billet SET bil_titre=?, bil_contenu=? WHERE `t_billet`.`BIL_ID` = ?');
        $modifierBillet->execute(array($titre, $contenu, $idBillet));
        return $modifierBillet;
    }

}
