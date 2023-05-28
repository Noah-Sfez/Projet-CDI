<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="./images/lotus-symbol.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        //var_dump($pdo);
        session_start();
        $random_user = $pdo->query('SELECT id_users, user_photo, pseudo, prenom, nom FROM users ORDER BY RAND() LIMIT 1')->fetch(PDO::FETCH_ASSOC);
        $user_id=  $_SESSION['user_id'];
    ?>
      <header class="header nav-profil">
        <a href="#" class="nav-button"><img src="./images/Twitter-LogoPNG1.png" alt="logo-twitter" class="logo logo-resp"></a>
        <div class="nav-bar">
          <a href="index.php" class="nav">Home</a>
          <a href="" class="nav">Bookmarks</a>
          <a href="profil.php" class="nav">Profil</a>
          <a href="recherche.php" class="nav">Explore</a>
          <a href="#" class="nav">Settings </a>
        </div> 
        
        <div class="profil">
          <div class="img-profil">
            <img src="<?php echo $random_user['user_photo']; ?>" alt="" class="img-profil">
          </div>
          <div class="utilisateur">
            <p>@<?php  echo $_SESSION['pseudo']; ?></p>
            <p><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></p>
          </div>
        </div>
      </header>
    <main>
      <div class="head-profil">
        <div class="back-settings">
            <h1>Settings</h1>
            <div class="settings-content">
                <div class="mode-sombre">
                    <h2>Mode Sombre :</h2>
                    <button id="toggle-dark-mode">Activer/Désactiver</button>

                </div>
            </div>
          
        </div>
        
      </div>
      
    </main>
<script src="app.js"></script>
</body>
</html>