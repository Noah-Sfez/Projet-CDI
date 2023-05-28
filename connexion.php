<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="./images/lotus-symbol.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="connectio">
<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);
session_start();
$shakeButtonClass = ''; 
$error = '';
if($_POST){
    $mail=$_POST['mail'];
    $password=$_POST['mdp'];

    $query = "SELECT * FROM users WHERE mail = :mail";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'mail'=> $mail
    ]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($user);
    if ($user && password_verify($password, $user['mdp'])) {
        
        $_SESSION['prenom']=$user['prenom'];
        $_SESSION['nom']=$user['nom'];
        $_SESSION['pseudo']=$user['pseudo'];
        $_SESSION['id'] = $user['id_users'];
        $_SESSION['date_naissance'] = $user['date_de_naissance'];
    
        $pseudo = $user['pseudo'];
        $user_id = $user['id_users'];

        $_SESSION['pseudo']= $pseudo;
        $_SESSION['user_id']= $user_id;
        var_dump($_SESSION);
        header('Location: index.php');
        exit;
    } else {
        $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
        $shakeButtonClass = 'text-white shake-button';
    }
}

?>

<div class="form_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <form method="post" class="form_horizontal">
                    <div class="form_icon"><i class="fa fa-user"></i></div>
                    <h3 class="title">Connexion</h3>
                    <p><?php echo $error;?></p>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-user"></i></span>
                        <input class="form-control" type="email" name="mail" placeholder="e-mail">
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" type="password" name="mdp" placeholder="password">
                    </div>

                    <button class="btn signin <?php echo $shakeButtonClass; ?>" type="submit">login</button>

                    <ul class="form-options">
                        <li><a href="#"></a></li>
                        <li><a href="inscription.php">Create new account</a><i class="fa fa-arrow-right"></i></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>