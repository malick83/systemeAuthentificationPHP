<?php
require 'util.php';
init_php_session();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Page d'accueil</title>
</head>
<body>
    <h1 style="text-align:center;">Page d'accueil</h1>

    <hr style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
        
        
        
        <?php if(is_admin()): ?>
            <div style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
                <p>Bienvenue <?= htmlspecialchars($_SESSION['userFirstName']) ?> <?= htmlspecialchars($_SESSION['userLastName'])?> | <a href="index.php?action=logout">Se déconnecter ?</a></p>
                <p>Vous êtes connecté. Vous êtes sur la page d'accueil et vous êtes un administrateur du site</p>
                <nav style="width:1050px;margin:auto;margin-bottom:80px;margin-top:18px;height:3px;">
                <ul style="list-style:none;display: inline-flex;">
                    <li><a href="content.php">&laquo; Content</a></li>
                </ul>
            </nav>
            </div>

        <?php elseif(is_logged()): ?>
            <div style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
                <p>Bienvenue <?= htmlspecialchars($_SESSION['userFirstName']) ?> <?= htmlspecialchars($_SESSION['userLastName'])?> | <a href="index.php?action=logout">Se déconnecter ?</a></p>
                <p>Vous êtes connecté. Vous êtes sur la page d'accueil et vous êtes un visiteur simple du site</p>
                <nav style="width:1050px;margin:auto;margin-bottom:80px;margin-top:18px;height:3px;">
                <ul style="list-style:none;display: inline-flex;">
                    <li><a href="content.php">&laquo; Content</a></li>
                </ul>
            </nav>
            </div>
        <?php else: ?>
            <?php header('Location: index.php');?>
        <?php endif; ?>

</body>
</html>

