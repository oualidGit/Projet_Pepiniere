<?php 
    $title = "Inscription"; 
?>

<?php ob_start(); ?>

<div id="connexion">
    <h1>Inscription</h1>
    <form action="../index.php?action=inscription" method="post" id="formulaire" onSubmit="return valider()">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" class="boiteSaisie"/>
        </div>

        <div>
            <label for="email">Courriel</label>
            <input type="email" id="email" name="email" class="boiteSaisie"/>
        </div>

        <div>
            <label for="pass">Mot de Passe</label>
            <input type="password" id="pass" name="pass" class="boiteSaisie"/>
        </div>
        <div>
            <label for="confirmPass">Confirmer passe</label>
            <input type="password" id="confirmPass" name="confirmPass" class="boiteSaisie"/><br><span id="errorpass">mot de passe different</span>
        </div>
        <div>
            <input type="submit" value="Creer" class="button"/>
        </div>

    </form>
</div>
<script type="text/javascript">
        var spa = document.getElementById("errorpass");
        spa.style.visibility = "hidden";

        function valider(){
            var pseudo = document.getElementById("pseudo").value;
            var email = document.getElementById("email").value;
            var pass1 = document.getElementById("pass").value;
            var pass2 = document.getElementById("confirmPass").value;
            
            var ok = true;

            if (pseudo == null || pseudo == ""|| email == null || email == ""|| pass1 == null || pass1 == ""|| pass2 == null || pass2 == "") {
                spa.innerHTML = "Veuillez remplir tous les champs";
                spa.style.visibility = "visible";
                ok =  false;
            }
            else {
                //verification des mots de passe
                if (pass1.localeCompare(pass2) !== 0  ){
                    spa.innerHTML = "Les mots de passe sont differents";
                    spa.style.visibility = "visible";
                    ok = false;
                }
                else{
                    ok =  true;
                } 
            }
         
            return ok;
        }
    </script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>