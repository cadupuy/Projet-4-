<?php

namespace OpenClassrooms\Blog\Modele; // La classe sera dans ce namespace

require_once "Config/modele.php";
class CommentairesManager extends Modele
{

    // Renvoie la liste de tous les commentaires signalés
    public function getcommentaire()
    {
        $sql = 'SELECT com_id AS id, com_date AS date,'
            . ' COM_AUTEUR AS auteur, com_contenu AS contenu, com_signale AS signale, bil_id AS idbil FROM T_COMMENTAIRE'
            . ' WHERE com_signale=true';
        $commentaire = $this->executerRequete($sql);
        return $commentaire;
    }

    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT com_id AS id, com_date AS date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(NOW(), ?, ?, ?)';
        $ajout = $this->executerRequete($sql, array($auteur, $contenu, $idBillet));
        return $ajout;
    }

    // Modifie les données d'un commentaire pour le passer en signaler
    public function commentaireSignale($idCommentaire)
    {
        $sql = 'UPDATE t_commentaire SET com_signale=TRUE WHERE COM_ID = ?';
        $signalerCommentaire = $this->executerRequete($sql, array($idCommentaire));
        return $signalerCommentaire;
    }

    // Modifie les données d'un commentaire pour le passer en Validé
    public function commentaireValide($idCommentaire)
    {
        $sql = 'UPDATE t_commentaire SET com_signale=FALSE WHERE COM_ID = ?';
        $signalerCommentaire = $this->executerRequete($sql, array($idCommentaire));
        return $signalerCommentaire;
    }

    //  Supprime un billet de la base de données
    public function deleteCommentaire($idCommentaire)
    {
        // Supprime un billet de la base de données
        $sql = 'DELETE FROM `t_commentaire` WHERE `t_commentaire`.`com_ID` = ?';
        $suppression = $this->executerRequete($sql, array($idCommentaire));
        return $suppression;
    }

}
