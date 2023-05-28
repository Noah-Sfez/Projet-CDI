<!DOCTYPE html>
<html lang="fr">
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
// Cette page est destinée pour toutes les recherches d'autres utilisateurs que celui connecté 
// Donc pour cela on recupère directement dans l'url le pseudo de l'utilisateur qui sera affiché sur cette page
        if(isset($_GET['profil'])){
// Et on place donc ce pseudo dans une variable 
            $profil_id = $_GET['profil'];
        } 
// Ici la variable $random_user est faite pour générer les photos de profil et les bannières des utilisateurs aléatoirement grâce à un url dans la base de donnée 
        $random_user = $pdo->query('SELECT id_users, user_photo, pseudo, prenom, nom FROM users ORDER BY RAND() LIMIT 1')->fetch(PDO::FETCH_ASSOC);
// Ensuite ici je récupère toutes les informations de l'utilisateur en faisant correspondre la variable $profil_id avec les différents pseudos stockés en base de donnée 
        $user_query = $pdo->query("SELECT * FROM users WHERE pseudo='$profil_id'");
        $user = $user_query->fetch(PDO::FETCH_ASSOC);
        //var_dump($user);
        //var_dump($profil_id);
    ?>
<!-- Ici on retrouve l'overlay ainsi que la nav bar comme sur toutes les pages -->
    <div class='overlay'></div>
    <button class='button-menu profil-page'>Menu</button>
    <header class="header nav-profil">
      <nav class="nav-bar user profil">
        <a href="index.php" class="nav">Home</a>
        <a href="" class="nav">Bookmarks</a>
        <a href="profil.php" class="nav">Profil</a>
        <a href="recherche.php" class="nav">Explore</a>
        <a href="settings.php" class="nav">Settings </a>
      </nav> 
<!-- Avec bien sûr le modal et son contenu -->
      <button id="myBtn" class="btn-modal">Tueets</button>

      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
            <div class="prof-modal">
            </div>
<!-- On a donc ici le form du modal -->
            <form method="post">
              <textarea name="tweet" cols="60" rows="7" class="modal-tweet monTweet" placeholder="What's happening ?" required></textarea>
              <select name="genre" class="type_tweet" required>
              <option value="">Type</option>
                <option value="Sport" class="sport">Sport</option>
                <option value="Politique" class="politique">Politique</option>
                <option value="Musique" class="musique">Musique</option>
                <option value="Divertissement" class="divertissement">Divertissement</option>
                <option value="Cinéma" class="cinema">Cinéma</option>
                <option value="Voyage" class="voyage">Voyage</option>
                <option value="Cuisine" class="cuisine">Cuisine</option>
                <option value="Art" class="art">Art</option>
              </select>
              <label for="image_tweet" class="custom-file-upload">
                  <img src="./images/input-media.png" alt="Uploader une image" class="input-media">
              </label>
              <input type="file" accept=".png, .jpeg, .gif" name="image_tweet" id="image_tweet" style="display:none;">
              <input type="submit" value="Tuitts" class="tuitts-modal">
            </form>
        </div>
      </div>
      <div class="profil">
<!-- On a donc ici le profil de l'utilisateur connecté qui s'affiche en bas à gauche de l'écran -->
        <div class="img-profil">
          <a href="profil.php"><img src="<?php echo $random_user['user_photo']; ?>" alt="" class="img-profil"></a>
        </div>
        <div class="utilisateur">
          <p>@<?php  echo $_SESSION['pseudo']; ?></p>
          <p><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></p>
        </div>
      </div>
    </header>
    <main class="main-profil">
      <div class="head-profil">
        <div class="bio">
<!-- Et ici on a donc la bannière et photo de la page de profil de l'utilisateur recherché ainsi que son pseudo, prénom et nom -->
          <img src="<?php echo $random_user['user_photo']; ?>" alt="" class="banniere-profil">
            <div class="head">
              <img src="<?php echo $random_user['user_photo']; ?>" alt="" class="head-img">
              <h3 class="head-name"><?php echo $user['prenom'] . ' ' . $user['nom']; ?></h3>
              <p class="head-pseudo">@<?php echo $user['pseudo']; ?></p>
            </div>
        </div>
<!-- Ici on a les boutons de tag pour le format mobile -->
        <div class="lost">
          <div class="filter-buttons">
            <button class="filter-btn buttons-all sport" data-tag="Sport">Sport</button>
            <button class="filter-btn buttons-all politique" data-tag="Politique">Politique</button>
            <button class="filter-btn buttons-all musique" data-tag="Musique">Musique</button>
            <button class="filter-btn buttons-all divertissement" data-tag="Divertissement">Divertissement</button>
            <button class="filter-btn buttons-all cinema" data-tag="Cinéma">Cinéma</button>
            <button class="filter-btn buttons-all voyage" data-tag="Voyage">Voyage</button>
            <button class="filter-btn buttons-all cuisine" data-tag="Cuisine">Cuisine</button>
            <button class="filter-btn buttons-all art" data-tag="Art">Art</button>
            <button class="reset-filter resetButton">Reset</button>
          </div>
        </div>
        <div class="profil-tweet">
          <?php
// Ici on affiche tous les tweets de la personne recherchée. Donc grâce à la variable $user déclaré tout en haut ainsi qu'à la colonne id_users dans ma table tweet, je peux sélectionner
// uniquement tous les tweets d'une seule personne avec son id. 
            $rqt= "SELECT * FROM tweet WHERE id_users='" . $user['id_users'] . "' ORDER BY date_heure_message DESC";
            $result = $pdo->query($rqt);
// Et donc ensuite ici j'affiche les tweets trouvés :
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="tweet_content ' . $row['type'] .' content-respo">';
              echo '<div class="pseudo_message">';
              echo '<span class="pseudo_tweet">' . $user['pseudo'] . '</span><br>';
              echo '<span class="message_tweet">' .$row['message'] . '</span><br>';
              if(isset($row['image_chemin']) && !empty($row['image_chemin'])) {
                echo '<img src="' . $row['image_chemin'] . '" alt="" class="image-tweet">';
              }
              echo '</div>';
              echo '<div class="date_supprimer">';
              echo $row['date_heure_message'] . '<br>';
              echo '<div class="type_response">';
              echo $row['type'];
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          ?>
          
        </div>
      </div>
<!-- Enfin on retrouve les boutons de tag qui ne s'affichent que sur le format ordinateur -->
      <div class="last-profil">
        <a href="inscription.php" class="deconnexion">Déconnexion</a>
          <div class="filter-buttons">
            <button class="filter-btn buttons-all buttons-noresp sport" data-tag="Sport">Sport</button>
            <button class="filter-btn buttons-all buttons-noresp politique" data-tag="Politique">Politique</button>
            <button class="filter-btn buttons-all buttons-noresp musique" data-tag="Musique">Musique</button>
            <button class="filter-btn buttons-all buttons-noresp divertissement" data-tag="Divertissement">Divertissement</button>
            <button class="filter-btn buttons-all buttons-noresp cinema" data-tag="Cinéma">Cinéma</button>
            <button class="filter-btn buttons-all buttons-noresp voyage" data-tag="Voyage">Voyage</button>
            <button class="filter-btn buttons-all buttons-noresp cuisine" data-tag="Cuisine">Cuisine</button>
            <button class="filter-btn buttons-all buttons-noresp art" data-tag="Art">Art</button>
          </div>
          <button class="reset-filter resetButton noResp">Reset</button>
      </div>
      
    </main>
<script src="app.js"></script>
</body>
</html>