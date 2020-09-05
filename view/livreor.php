<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$title = "Livredor";

ob_start(); 
?>

<div id="coordonnees">

    <div id="connexion" class="com" >

        <h2>Faites un commentaire ici</h2>

        <form action="../index.php?action=addcomment" method="post">
            <div>
                <label for="commentaire">Commentaire</label>
                <textarea id="message" name="message" class="boiteSaisie" style="margin-left:0;width:250px; height:84px ; margin:0px"></textarea>
            </div>
            <br>
            <div>
                <input type="submit" value="Envoyer"  class="button"/>
            </div>
        </form>

    </div>

</div>

<div id="zoneMessage">

    <h2>Les 10 derniers commentaires</h2>
    
    <?php while ($data = $comments->fetch()) { ?>

        <div class="boiteCommentaire">
            <p class="user">
                <?= $Cmanager->getNom(htmlspecialchars($data['iduser']));?>
                <span class="date">(<?= $data['date'] ?>)</span>
            <p>

            <p class="commentaire">  > 
                <?= nl2br(htmlspecialchars($data['commentaire'])) ?>
                <?php if ($_SESSION['idUser']==$data['iduser'])
                    echo ' <p><a class="button lienModif" href="view/modifierCommentaire.php?id='.$data['idcommentaire'].'">Modifier</a></p>';
                ?>
            </p>
        </div>
        <hr class="ligneSeparatrice"/>
    <?php } 
        $comments->closeCursor();
    ?>

</div>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>