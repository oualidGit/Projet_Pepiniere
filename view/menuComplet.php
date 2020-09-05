<div id="menu">
    <ul>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="../index.php?action=contact">Contact</a></li>
        <li><a href="../index.php?action=afficherlivreor"> Livre d'or</a></li>
        <li><a href="../index.php?action=afficherProduits">Produits</a></li>
        <li><a id="changerTheme" class="menuItem" href="">Theme Dark/Light</a></li>
        <li> 
        <?php
            if (isset($_SESSION['pseudo'])){
                echo "User connecté : " . $_SESSION['pseudo'] . '<span> <a href="../index.php?action=deconnexion"> (se deconnecter)</a></span>';
            }
        ?>
        </li>
    </ul>
</div>