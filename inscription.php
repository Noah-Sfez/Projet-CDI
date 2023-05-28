<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="./images/lotus-symbol.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="inscri">
<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);
session_start();
$error = '';
if($_POST){
    $_POST['prenom'] = addslashes($_POST['prenom']);
    $_POST['nom'] = addslashes($_POST['nom']);
    $_POST['mail'] = addslashes($_POST['mail']);
    $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $_POST['pseudo'] = addslashes($_POST['pseudo']);

    $pdo->exec("INSERT INTO users (pseudo, prenom, nom, mail, mdp, date_de_naissance) VALUES ('$_POST[pseudo]', '$_POST[prenom]', '$_POST[nom]', '$_POST[mail]', '$_POST[mdp]', '$_POST[birth]')");
    
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['pseudo'] = $_POST['pseudo'];

    $result = $pdo->query("SELECT id_users FROM users WHERE prenom = '$_POST[prenom]' AND nom = '$_POST[nom]' AND mail = '$_POST[mail]'");
    $user = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_id'] = $user['id_users'];
    header("Location: index.php");
}else{

?>
  
<div class="form_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <form method="post" class="form_horizontal">
                    <div class="form_icon"><i class="fa fa-user"></i></div>
                    <h3 class="title">Inscription</h3>
                    <p><?php echo $error;?></p>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" name="prenom" placeholder="Prénom" required>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" name="nom" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="text" name="pseudo" placeholder="Pseudo" required>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                        <input class="form-control" type="date" name="birth" required>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-envelope-o"></i></span>
                        <input class="form-control" type="email" name="mail" placeholder="e-mail" required>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" type="password" name="mdp" placeholder="password" required>
                    </div>

                    <button class="btn signin" type="submit">login</button>

                    <ul class="form-options">
                        <li><a href="#"></a></li>
                        <li><a href="connexion.php">Signin</a><i class="fa fa-arrow-right"></i></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>