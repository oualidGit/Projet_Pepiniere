<?php
if(!isset($_SESSION)) 
{ 
    session_start();
} 

require('controller/controller.php');

if (isset($_GET['action'])) {
    
    if ($_GET['action'] == 'contact') {
        afficherVueContact();
    } 

    elseif ($_GET['action'] == 'addcomment') {
        if (isset($_POST['message'])){
            $id = $_SESSION['idUser'];
            addComment($id , $_POST['message']);
        } 
    }

    elseif ($_GET['action'] == 'modifComment') {
            $id = $_GET['id'];
            $commentaire = $_POST['commentaire'];
            modifComment($id , $commentaire);
        } 

   elseif ($_GET['action'] == 'addmessage') {
        if (isset($_POST['nom']) && isset($_POST['objet']) && isset($_POST['courriel']) && isset($_POST['message'])) {
            envoimessage( $_POST['nom'],$_POST['courriel'], $_POST['objet'],$_POST['message']);
        }
        else {
            echo 'Erreur : tout les champs doivent etre rempli';
        }
    }
 
    elseif ($_GET['action'] == 'seconnecter'){
     if (isset($_POST['pseudo']) && isset($_POST['pass'])){
         seConnecter($_POST['pseudo'] , $_POST['pass']);
     }
    }

    elseif ($_GET['action'] == 'deconnexion'){
        deconnexion();
    }

     elseif ($_GET['action'] == 'afficherlivreor') {
        listercommentaire();
    } 

    elseif ($_GET['action'] == 'afficherProduits') {
        afficherProduits();
    } 

    elseif ($_GET['action'] == 'afficherDetailProduit') {
        
        afficherDetailProduit($_GET['id']);
    } 
    
    elseif ($_GET['action'] == 'acceuil') {
        afficherAcceuil();
    } 

    elseif ($_GET['action'] == 'acceuilbase') {
        afficherAcceuilBase();
    } 

    elseif ($_GET['action'] == 'accueil12') {
        if (isset($_SESSION['pseudo']))
            afficherAcceuil();
        else 
            afficherAcceuilBase();
    } 

    elseif ($_GET['action'] == 'retourAccueil') {
        if (isset($_SESSION['pseudo']))
            afficherAcceuil();
        else 
            afficherAcceuilBase();
    } 
    elseif ($_GET['action'] == 'inscription') {
        
        if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email'])){
            inscription($_POST['pseudo'] , $_POST['pass'] ,$_POST['email']);
        }
        else {
            echo 'Erreur : tout les champs doivent etre rempli';
        }
    } 
} 
else {
    afficherAcceuilBase();
}