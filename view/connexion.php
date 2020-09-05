<?php 
//session_start();
$title = "Connexion"; ?>

<?php ob_start(); ?>

<div id="connexion">

    <h1>Connexion</h1>

    <form action="../index.php?action=seconnecter" method="post">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" class="boiteSaisie"/><br>
        </div>
        <br>
        <div>
            <label for="pass">Mot de Passe</label>
            <input type="password" id="pass" name="pass" class="boiteSaisie"/><br>
        </div>
        <br>
        <div>
            <input type="submit" id="btnEnvoie" value="Envoyer" class="button"/>
            <a href="inscription.php">creer un nouveau compte</a>
        </div>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>