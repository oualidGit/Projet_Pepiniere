<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
// Chargement des classes
require_once('model/messagectcmanager.php');
require_once('model/commentmanager.php');
require_once('model/connexionmanager.php');
require_once('model/productManager.php');

function envoimessage($nom, $courriel, $objet,$message)
{
    $messagectcmanager = new Messagectcmanager(); // Création d'un objet
    $postermessage = $messagectcmanager->postMessage($nom, $courriel,$objet,$message); // Appel d'une fonction de cet objet
    if ($postermessage === false){
        throw new Exception('impossible d ajouter le message');
    }
    else
        require('view/mercicontact.php');
}

function listercommentaire()
{
    $Cmanager = new commentmanager();
    $comments = $Cmanager->getComments();
    require('view/livreor.php');
}


function addComment($id , $commentaire)
{
    $Cmanager = new commentmanager();
    $line = $Cmanager->postComment($id, $commentaire);
    $comments = $Cmanager->getComments();
    require('view/livreor.php');
}

function modifComment($id , $commentaire)
{
    $Cmanager = new commentmanager();
    $line = $Cmanager->updateComment($id, $commentaire);
    $comments = $Cmanager->getComments();
    require('view/livreor.php');
}

function afficherProduits()
{
    $proManager = new ProductManager();
    $produits = $proManager->getAllProducts();
    require('view/Produits.php');
}

function afficherDetailProduit($id){
    $p = new ProductManager();
    $leproduit = $p->getProduct($id);
    require('view/detailProduit.php');
}

function seConnecter($pseudo,$pass){
    $connex = new ConnexionManager();
    $resultat = $connex->verifierDonnees($pseudo,$pass);
    if (!$resultat)
    {
        header('Location: view/vueErreurs.php');
    }
    else
    {       
        $_SESSION['idUser'] = $resultat['idUser'];
        $_SESSION['pseudo'] = $pseudo;
        header('Location: view/acceuil.php');
    }
}

function deconnexion(){
    $_SESSION = array();
    session_destroy();
    header('Location: view/acceuilbase.php');
}

function afficherAcceuil(){
    header('Location: view/acceuil.php');
}

function afficherAcceuilBase(){
    //header('Location: view/acceuilbase.php');
    require('view/acceuilbase.php');
}

function afficherModifComment($id){
    header('Location: view/modifComment.php?');
}
function inscription($pseudo,$pass,$email){
    $conManager = new ConnexionManager();
    $ins = $conManager->inscription($pseudo, $pass, $email); 
    if (!$ins){
        echo "inscription echouee";
    }
    else{
        echo "inscription reussie";
        header('Location: view/connexion.php');
    }
}

function afficherVueContact(){
    require('view/vuecontact.php');
}

function afficherVueInscription(){
    require('view/inscription.php');
}

function calculerNbrVisiteurs(){
    $connex = new ConnexionManager();
    $nbrVisiteurs = $connex->CompterVisiteurs();
    return $nbrVisiteurs; 
}
