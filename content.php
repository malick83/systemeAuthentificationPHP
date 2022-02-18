<?php
require 'util.php';
init_php_session();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="width:1050px;margin:auto;">
    <h1 style="text-align:center;">Page content</h1>
    <hr style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
    <?php if(is_admin()): ?>

        <p>Sachez que je sais toujours qui vous êtes, <?= htmlspecialchars($_SESSION['userFirstName']) ?> <?= htmlspecialchars($_SESSION['userLastName'])?> 😇  | <a href="index.php?action=logout">Se déconnecter ?</a></p>
        <p>Vous êtes toujours connecté. Vous êtes sur la page Content et Vous êtes un administrateur du site</p>
        <nav>
            <ul style="list-style:none;display: inline-flex;">
                <li><a href="accueil.php">&laquo; Accueil</a></li>
            </ul>
        </nav>
    <?php elseif(is_logged()): ?>

        <p>Sachez que je sais toujours qui vous êtes, <?= htmlspecialchars($_SESSION['userFirstName']) ?> <?= htmlspecialchars($_SESSION['userLastName'])?> 😇  | <a href="index.php?action=logout">Se déconnecter ?</a></p>
        <p>Vous êtes toujours connecté. Vous êtes sur la page Content et Vous êtes un visiteur simple du site</p>
        <nav>
        <ul style="list-style:none;display: inline-flex;">
            <li><a href="accueil.php">&laquo; Accueil</a></li>
        </ul>
    </nav>
    <?php else: ?>
       <p>Vous ne vous êtes pas connecté à un compte, Merci de vous connecter sur la page de connexion où si vous</br> n'avez pas de compte, de vous s'inscrire sur la page d'inscription</p>
       <nav>
        <ul style="list-style:none;display: inline-flex;">
            <li><a href="index.php">&laquo; Connexion</a></li>
            <li style="padding-left:20px;"><a href="inscription.php">&laquo; S'inscrire</a></li>
        </ul>
    </nav>
    <?php endif; ?>
    

    
</body>
</html>