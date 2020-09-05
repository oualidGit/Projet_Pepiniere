<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$title = "Contact"; ?>

<?php ob_start(); ?>

<div id="coordonnees">
    <p>Adresse : 6400 16eme avenue Montreal , H1X 2S9 </p>
    <p>Telephone : (514)-376-1620</p>
    <p>Emplacement</p>
    <img src="../public/images/mapsPepiniere.png" alt="mapPepiniere" width="400px">
</div>

<div id="zoneMessage">

    <div id="connexion">

        <h3>Nous contacter</h3>

        <form action="../index.php?action=addmessage" method="post">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="boiteSaisie"/>
            </div>
            <div>
                <label for="courriel">Courriel</label>
                <input type="text" id="courriel" name="courriel" class="boiteSaisie"/>
            </div>
            <div>
                <label for="objet">Objet</label>
                <input type="text" id="objet" name="objet" class="boiteSaisie"/>
            </div>
            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message" class="boiteSaisie" style="width:340px; height:84px ; margin:0px"></textarea>
            </div>
            <div>
                <input  class="button" type="submit" value="Envoyer" />
            </div>
        </form>

    </div>

</div>

<?php $content = ob_get_clean();

require('template.php'); ?>