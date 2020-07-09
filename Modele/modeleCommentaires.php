<?php
require_once "Modele/modele.php";
class CommentairesManager extends Modele
{

    // Renvoie la liste de tous les commentaires signalés
    public function getcommentaire()
    {
        $bdd = $this->getBdd();
        $commentaire = $bdd->query('SELECT com_id AS id, com_date AS date,'
            . ' COM_AUTEUR AS auteur, com_contenu AS contenu, com_signale AS signale, bil_id AS idbil FROM T_COMMENTAIRE'
            . ' WHERE com_signale=true');
        return $commentaire;
    }

    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $bdd = $this->getBdd();
        $commentaires = $bdd->prepare('SELECT com_id AS id, com_date AS date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
            . ' where BIL_ID=?');
        $commentaires->execute(array($idBillet));
        return $commentaires;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $bdd = $this->getBdd();
        $ajout = $bdd->prepare('INSERT into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(NOW(), ?, ?, ?)');
        $ajout->execute(array($auteur, $contenu, $idBillet));
        return $ajout;
    }

    // Modifie les données d'un commentaire pour le passer en signaler
    public function commentaireSignale($idCommentaire)
    {
        $bdd = $this->getBdd();
        $signalerCommentaire = $bdd->prepare('UPDATE t_commentaire SET com_signale=TRUE WHERE COM_ID = ?');
        $signalerCommentaire->execute(array($idCommentaire));
        return $signalerCommentaire;
    }

    // Modifie les données d'un commentaire pour le passer en Validé
    public function commentaireValide($idCommentaire)
    {
        $bdd = $this->getBdd();
        $signalerCommentaire = $bdd->prepare('UPDATE t_commentaire SET com_signale=FALSE WHERE COM_ID = ?');
        $signalerCommentaire->execute(array($idCommentaire));
        return $signalerCommentaire;
    }

    //  Supprime un billet de la base de données
    public function deleteCommentaire($idCommentaire)
    {
        // Supprime un billet de la base de données
        $bdd = $this->getbdd();
        $suppression = $bdd->prepare('DELETE FROM `t_commentaire` WHERE `t_commentaire`.`com_ID` = ?');
        $suppression->execute(array($idCommentaire));
        return $suppression;
    }

}
