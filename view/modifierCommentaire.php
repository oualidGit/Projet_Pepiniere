<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$title = "Modifier Commentaire";

ob_start(); 
?>

<form  method="post">
    <caption>Modifier un commentaire </caption>
    <div>
        <label for="commentaire">Commentaire : </label>
        <input type="text" id="commentaire" name="commentaire" class="boiteSaisie"/>
    </div>
    <div>
        <input class="button" type="submit" value="Valider" formaction="../index.php?action=modifComment&id=<?= $_GET['id'];?>" />
        <input class="button" type="submit" value="Annuler" formaction="../index.php?action=afficherlivreor"/>

    </div>
</form>

<?php 
$content = ob_get_clean();
require('template.php'); 
?>