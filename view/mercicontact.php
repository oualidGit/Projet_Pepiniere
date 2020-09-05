<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$title = "Remerciement";
ob_start(); 
?>

<p>
  Merci <?= $nom; ?>, nous vous repondrons sous peu a l'adresse courriel  <?= $courriel;?>
</p>
<?php 
$content = ob_get_clean();
require('template.php'); 
?>