<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $title = 'Erreur';
    ob_start(); 
?>

<p>Nom utilisateur ou mot de passe erroné</p>

<?php
    $content = ob_get_clean();
    require('template.php'); 
 ?>