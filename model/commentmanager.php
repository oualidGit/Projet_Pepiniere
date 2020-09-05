<?php
require_once("model/Manager.php");
class commentmanager extends Manager
{
    public function getComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM tblmessagelivreor ORDER BY idcommentaire DESC LIMIT 10');
        $comments=$req;
       
        return $comments;
    }

    public function postComment($id, $commentaire)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO tblmessagelivreor(commentaire, point, date , iduser) VALUES(?, 0, NOW(), ?)');
        $affectedLines = $comments->execute(array($commentaire, $id));
        return $affectedLines;
    }

	public function getComment($idcommentaire){
		
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT idcommentaire, commentaire, point,  DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr , iduser FROM tblmessagelivreor WHERE idcommentaire = ?');
        $req->execute(array($idcommentaire));
        $comment = $req->fetch();

        return $comment;		
    }
    public function getNom($iduser){
		
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo from tbluser WHERE idUser = ?');
        $req->execute(array($iduser));
        $nom = $req->fetch();
        
        return $nom['pseudo'];		
	}
	
	public function updateComment($idcommentaire, $commentaire)
	{
	    $db = $this->dbConnect();
        $req = $db->prepare('UPDATE tblmessagelivreor SET  commentaire=?, date = NOW() WHERE idcommentaire=?');
        $affectedLines = $req->execute(array($commentaire, $idcommentaire));

        return $affectedLines;
	}	
	
}
