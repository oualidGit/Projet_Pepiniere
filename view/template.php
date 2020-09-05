
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= "Pepiniére Labranche"?></title>
    <link href="../public/css/style.css" rel="stylesheet" />
    
</head>

<body>
    <div id="entete">
        <h3 id="anim">Bienvenue a la Pepiniere LABRANCHE...</h3>
        <img src="../public/images/imageSouris.jpg" alt="Image qui suit la souris" id="image_suit_souris"
            style="position:absolute;display:block;z-index:5;" />
        <?php 
            if (isset($_SESSION['pseudo'])){
                echo "<p> user connecté : " . $_SESSION['pseudo'] . '<span>   <a href="../index.php?action=deconnexion"> (se deconnecter)</a></span></p>';
                require('menuComplet.php');
            }
            else {
                require('menuBase.php');
            }
        ?>
    </div>

    <div id = "contenu">
        <?= $content ?>
        <script type="text/javascript" src="../public/script.js"></script>
        <img src=../public/images/fondecran.png id=fondecran class=fondecran alt=/>
    </div>

    <div id="content-wrap">
     <!-- all other page content -->
   </div>
    
    <div id="piedPage">
        <p id="copyright">Copyright pepiniere Labranche 2020</p> 
        <p id="datePied"><?= date('l j F Y, H:i'); ?></p>
    </div>

    <script src="../public/scriptTemplate.js"></script>
</body>

</html>