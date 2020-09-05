<?php
require_once("model/Manager.php");
 
class Messagectcmanager extends Manager
{
    public function postMessage($nom,$courriel, $objet,$message)
    {
        $db=$this->dbConnect();
        $messages = $db->prepare('INSERT INTO tblmessagescontact(nom,courriel, objet,message) VALUES(?, ?, ?, ?)');
        $affectedLines = $messages->execute(array($nom, $courriel,$objet,$message));
      
        return $affectedLines;
    }
}
