<?php 
if(!isset($_SESSION)) 
{
    session_start(); 
}
$title = "Produits";

ob_start(); ?>

<h1>NOS PRODUITS</h1>
<!--<img src="../public/images/'.$p['id'].'.jpg"><br> -->
<div class="conteneurImagesProduits">
    <?php
    while ($p = $produits->fetch())
    {
    ?>
        <?php 
            echo '
            <div class="imageProduit">
            <a href="../index.php?action=afficherDetailProduit&id='.$p['id'].'">'.'<img src="../public/images/'.$p['id'].'.jpg"><br>'.$p['nom'].'</a><br>
            </div>
            ';
        ?>
    <?php
    }
    $produits->closeCursor();
    ?>
</div>

<?php 
    $content = ob_get_clean();
    require('template.php'); 
?>