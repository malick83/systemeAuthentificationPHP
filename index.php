<?php
/*
$motdepasse = 'passer';
$hash = password_hash($motdepasse, PASSWORD_BCRYPT, ['cost' => 10]);
echo password_verify($motdepasse, $hash);
echo '<pre>';
print_r(password_get_info($hash));
echo '</pre>';
password_needs_rehash($motdepasse, $hash);
exit;
*/

require_once 'Database.php';
require 'util.php';

// clean_php_session();
// exit;
init_php_session();

if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'logout')
{
    clean_php_session();
    header('Location: index.php');
}


if(isset($_POST['userValidation']))
    if(isset($_POST['userMail']) && !empty($_POST['userMail']) && isset($_POST['userPassWord']) && !empty($_POST['userPassWord']))
    {
        $userMail = $_POST['userMail'];
        $userPassWord = $_POST['userPassWord'];

        $request = $PDO->prepare('SELECT * FROM auth_users WHERE user_mail = :my_mail OR user_pseudo = :my_pseudo');
        $request->bindValue(":my_mail", $userMail);
        $request->bindValue(":my_pseudo", $userMail);
        $request->execute();

        $listUsers = $request->fetch(PDO::FETCH_ASSOC);
        if($listUsers && password_verify($userPassWord, $listUsers['user_password']))
        {
            // echo '<pre>';
            // print_r($listUsers);
            // echo '</pre>';
            // echo 'Connecté !!!';

            $_SESSION['userMail'] = $userMail;
            $_SESSION['userRank'] = $listUsers['user_admin'];
            $_SESSION['userFirstName'] = $listUsers['user_firstname'];
            $_SESSION['userLastName'] = $listUsers['user_lastname'];
            header('Location: accueil.php');
        }
        else
            echo '<p style="text-align:center;color:red;">Login ou mot de passe incorrect</p>';
    }

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Page de connexion</title>
</head>
<body>
    <h1 style="text-align:center;">Page de connexion</h1>

    <hr style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
        
        
        
        <?php if(is_admin()): ?>
            <div style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
                <p>Encore une fois bienvenue <?= htmlspecialchars($_SESSION['userFirstName']) ?> <?= htmlspecialchars($_SESSION['userLastName'])?> | <a href="index.php?action=logout">Se déconnecter ?</a></p>
                <p>Vous ête sur la page de connexion. Vous êtes déjà connecté et Vous êtes un administrateur du site</p>
                <nav style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
                <ul style="list-style:none;display: inline-flex;">
                    <li><a href="content.php">&laquo; Content</a></li>
                </ul>
            </nav>
            </div>

        <?php elseif(is_logged()): ?>
            <div style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
                <p>Encore une fois bienvenue <?= htmlspecialchars($_SESSION['userFirstName']) ?> <?= htmlspecialchars($_SESSION['userLastName'])?> | <a href="index.php?action=logout">Se déconnecter ?</a></p>
                <p>Vous ête sur la page de connexion. Vous êtes déjà connecté.Vous êtes un visiteur simple du site</p>
                <nav style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
                <ul style="list-style:none;display: inline-flex;">
                    <li><a href="content.php">&laquo; Content</a></li>
                </ul>
            </nav>
            </div>
        <?php else: ?>
            <main style="border-radius: 15px 15px 15px 15px;width:600px;margin:auto;box-shadow: 10px 8px 34px 6px rgba(185, 181, 181, 0.685);padding-left:30px;padding-right:30px;padding-top:30px;padding-bottom:30px;">
                <form method="POST">
                <div class="mb-3">
                    <label for="usermail" class="form-label">Nom utilisateur</label>
                    <input id="usermail" class="form-control" name="userMail" type="text" placeholder="Entrez votre nom utilisateur" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="userpassword" class="form-label">Mot de passe</label>
                    <input name="userPassWord" type="password" class="form-control" id="userpassword" placeholder="Entrez votre mot de passe">
                </div>
                    <button type="submit" class="btn btn-primary" name="userValidation">Se connecter</button>
                </form>
                <nav style="width:155px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
                <ul style="list-style:none;display: inline-flex;">
                    <li><a href="inscription.php">&laquo; S'inscrire</a></li>
                </ul>
            </nav>
        <?php endif; ?>

        </main>
</body>
</html>

