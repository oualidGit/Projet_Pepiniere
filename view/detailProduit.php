<?php 
if(!isset($_SESSION)) 
{
    session_start(); 
}
$title = "Details Produits"; ?>

<?php ob_start(); ?>

<p><a href="../index.php?action=afficherProduits">Retour a la page produits</a></p>
<div id="coordonnees">
<img  src="public/images/<?=$leproduit['id']?>.jpg" alt="produit">
</div>

<div id="zoneMessage">
    <h3><?= $leproduit['nom']; ?></h3>

    <p>appartient a la categorie : <?= $leproduit['categorie']; ?> </p>
    <h3>Description</h3>
    <p><?= $leproduit['description']; ?></p>
    <p>En stock : <?=$leproduit['quantite']; ?></p>
    <p>Prix : <?= $leproduit['prix'];?></p>

</div>

<?php 
    $content = ob_get_clean();
    require('template.php'); 
?>