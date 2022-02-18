<?php
if(isset($_POST['userInscription']))
{
    $userFirstNameS = isset($_POST['userFirstName']);
    $userFirstNameE = !empty($_POST['userFirstName']);

    $userLastNameS = isset($_POST['userLastName']);
    $userLastNameE = !empty($_POST['userLastName']);

    $userMailS = isset($_POST['userMail']);
    $userMailE = !empty($_POST['userMail']);

    $userPseudoS = isset($_POST['userPseudo']);
    $userPseudoE = !empty($_POST['userPseudo']);

    $userPassWordS = isset($_POST['userPassWord']);
    $userPassWordE = !empty($_POST['userPassWord']);

    $userPassWordConfirmationS = isset($_POST['userPassWordConfirmation']);
    $userPassWordConfirmationE = !empty($_POST['userPassWordConfirmation']);

    if($userFirstNameS && $userFirstNameE && $userLastNameS && $userLastNameE && $userMailS && $userMailE && $userPseudoS &&  $userPseudoE && $userPassWordS && $userPassWordE && $userPassWordConfirmationS && $userPassWordConfirmationE)
    {
        $userFirstName = $_POST['userFirstName'];
        $userLastName = $_POST['userLastName'];
        $userMail = $_POST['userMail'];
        $userPseudo = $_POST['userPseudo'];
        $userPassWord = $_POST['userPassWord'];
        $userPassWordConfirmation = $_POST['userPassWordConfirmation'];

        if($userPassWord !== $userPassWordConfirmation)
            echo "Les mots de passes ne correspondent pas";

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1 style="text-align:center;">Page d'inscription</h1>

    <hr style="width:1050px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;">
<main style="border-radius: 15px 15px 15px 15px;width:600px;margin:auto;box-shadow: 10px 8px 34px 6px rgba(185, 181, 181, 0.685);padding-left:30px;padding-right:30px;padding-top:30px;padding-bottom:30px;">
    <form method="POST">
        <div class="mb-3">
            <label for="userfirstname" class="form-label">Prénom</label>
            <input id="userfirstname" class="form-control" name="userFirstName" type="text" placeholder="Entrez votre prénom" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="userlastname" class="form-label">Nom</label>
            <input id="userlastname" class="form-control" name="userLastName" type="text" placeholder="Entrez votre nom" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="usermail" class="form-label">Mail</label>
            <input id="usermail" class="form-control" name="userMail" type="email" placeholder="Entrez votre adresse mail" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
            <label for="userpseudo" class="form-label">Nom utilisateur</label>
            <input id="userpseudo" class="form-control" name="userPseudo" type="text" placeholder="Entrez votre nom utilisateur" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="userpassword" class="form-label">Mot de passe</label>
            <input name="userPassWord" type="password" class="form-control" id="userpassWord" placeholder="Entrez votre mot de passe">
        </div>
        <div class="mb-3">
            <label for="userpasswordconfirmation" class="form-label">Confirmer votre mot de passe</label>
            <input name="userPassWordConfirmation" type="password" class="form-control" id="userpasswordconfirmation" placeholder="confirmer votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary" name="userInscription">S'inscrire</button>
    </form>
    <nav style="width:155px;margin:auto;margin-bottom:80px;margin-top:20px;height:3px;margin-top:25px;">
        <ul style="list-style:none;display: inline-flex;">
            <li><a href="index.php" >&laquo; Se connecter ?</a></li>
        </ul>
    </nav>
</main>
</body>
</html>