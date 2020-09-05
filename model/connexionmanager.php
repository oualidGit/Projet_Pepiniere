<?php
require_once("model/Manager.php");
 
class ConnexionManager extends Manager
{
   function verifierDonnees($pseudo,$pass){
        //  Récupération de l'utilisateur et de son mot de passe
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT idUser, pass FROM tbluser WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $resultat = $req->fetch();
        $isPasswordCorrect=false;
        // Comparaison du pass envoyé via le formulaire avec la base
        if($resultat['pass'] == $pass){
            $isPasswordCorrect = true;
        }
        else{
            $isPasswordCorrect=false;
            return null;
        }
        // $isPasswordCorrect = password_verify($pass, $resultat['pass']);
        
        return $resultat;
    }

    function inscription($pseudo, $pass, $email){
        $db=$this->dbConnect();
        // Insertion
        $req = $db->prepare('INSERT INTO tbluser(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($pseudo, $pass, $email));
        return $affectedLines;
    }

    function CompterVisiteurs(){
        $db=$this->dbConnect();
        $ip = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
        $req = $db->prepare('INSERT INTO tblVisiteurs(ip) VALUES(?)');
        $insertion = $req->execute(array($ip));
        $nbrVisiteurs = $db->query('SELECT * From tblVisiteurs');
        return $nbrVisiteurs->rowCount();
    }

}