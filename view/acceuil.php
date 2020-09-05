<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $title = 'Accueil';
    
    $content = "";
    require('template.php'); 
 ?>