<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Home</title>
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
//var_dump($_SESSION['user_photo']);
?>
<div>
<!-- Je vérifie si l'utilisateur est connecté et affiche le modal lui demandant de se connecter au cas où il ne l'est pas -->
  <?php
      if(isset($_SESSION) && !empty($_SESSION)){
        echo "<div class='bienvenue'><img src='./images/lotus-symbol.png' alt='logo-lotus' class='logo-lotus'>" . "<h2 class='maison'>Bonjour " . $_SESSION['pseudo'] . " , bienvenue sur Lotus !</h2>"."<img src='./images/lotus-symbol.png' alt='logo-lotus' class='logo-lotus'></div>
        <a href='inscription.php' class='deconnexion-responsive'>Déconnexion</a>
        <div class='overlay'></div>
        <button class='button-menu'>Menu</button>";
    } else {
        echo "<div class='maison'>
                <h3>Home</h3>
              </div>
              <div class='modal-connect'>
                <div class='modal-content-connect'>
                  <h2 class='title-modal-connect'>Connectez vous pour accéder à Lotus</h2>
                    <div class='button-modal-connect'>
                      <a href='inscription.php' class='inscrip-modal-connect'>S'inscrire</a>
                      <a href='connexion.php' class='connex-modal-connect'>Se connecter</a>
                    </div>
                </div> 
              </div>";
    };
      ?>
</div>
      <div class="space-top">
        <header class="header">
            
<!-- J'affiche ici la barre de navigation -->
            <nav class="nav-bar">
                <a href="#" class="nav">Home</a>
                <a href="" class="nav">Bookmarks</a>
                <a href="profil.php" class="nav">Profil</a>
                <a href="recherche.php" class="nav">Explore</a>
                <a href="settings.php" class="nav">Settings </a> 
            </nav> 
<!-- J'affiche le modal qui est géré après avec du JavaScript -->
            <button id="myBtn" class="btn-modal">Composer</button>
            <div id="myModal" class="modal">
              <div class="modal-content">
              <span class="close">&times;</span>
              <div class="prof-modal">
                <?php
                $i = $pdo->query('SELECT * FROM users');
                ?>
              </div>
<!-- Ici on retrouve le form qui est dans le modal pour gérer le post des tweets -->
                <form method="post" enctype="multipart/form-data">
                  <textarea name="tweet" id="messagemodal" cols="60" rows="7" class="modal-tweet monTweet" placeholder="What's happening ?" required></textarea>
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
                  <input type="file" accept=".png, .jpeg, .gif" name="image_tweet" class="media">
                  <input type="submit" value="Tuitts" class="tuitts-modal" id="bouton">
                </form>
              </div>
            </div>
<!-- Ici j'ai le code pour générer les photos et bannières de profil aléatoirement avec l'url rentrée dans la base de donnée -->
            <?php
            $random_user = $pdo->query('SELECT id_users, user_photo, pseudo, prenom, nom FROM users ORDER BY RAND() LIMIT 1')->fetch(PDO::FETCH_ASSOC);
            ?>
<!-- Ici on a le code qui affiche le nom de l'utilisateur ainsi que son pseudo et la photo de profil -->
            <div class="profil">
              <div class="img-profil">
                <a href="profil.php"><img src="<?php echo $random_user['user_photo']; ?>" alt="" class="img-profil"></a>
              </div>
              <div class="utilisateur">
                <p>@<?php  echo $_SESSION['pseudo']; ?></p>
                <p><?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></p>
              </div>
            </div>
        </header>
          <main>
<!-- Ici on a le form pour l'espace de tweet principal -->
            <div class="center center-respo">
              <form class="form-tweet" method="post" id="form-principal" enctype="multipart/form-data">
                <textarea name="tweet" id="message" cols="68" rows="10" placeholder="Composer..." class="text_tweet monTweet" required></textarea>
                <select name="genre" id="nav_type" class="type_tweet" required>
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
                <input type="file" accept=".png, .jpeg, .gif" name="image_tweet" class="media">
                <input type="submit" id="poster" value="Tuitts" class="poster">
              </form>
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
                </div>
                <button class="reset-filter resetButton">Reset</button>
            </div>
<!-- Ici on a le code pour pouvoir envoyer et stocker les images des tweets -->
              <?php
              $destination = NULL;
                if($_POST){
                  if(isset($_FILES['image_tweet'])){
                    $image_name = $_FILES['image_tweet']['name'];
                    $tmp_name = $_FILES['image_tweet']['tmp_name'];
                    if ($_FILES['image_tweet']['size'] <= 2097152) {
                      $dossier = './stockfile/';
                      $destination = $dossier . $image_name;
                      move_uploaded_file($tmp_name, $destination);
                      echo '';
                      }else{
                        echo 'La taille de votre image doit être inférieure à 2 MO';
                      }
                    } 
// Ici je prévois dans les tweets les attaques avec les slash 
                  $_POST['tweet'] = addslashes($_POST['tweet']);
// J'insère toutes les données dans la base de donnée 
                  $pdo->exec("INSERT INTO tweet (message, date_heure_message, type, image_chemin, id_users) VALUES ('$_POST[tweet]', NOW(), '$_POST[genre]', '$destination',  '{$_SESSION['user_id']}')");
                  }
// Et je join la table des tweets avec celle des utilisateurs 
                  $t = $pdo->query('SELECT t.id_tweet, t.message, t.date_heure_message, t.type, t.image_chemin, u.pseudo, u.user_photo, u.id_users FROM tweet t INNER JOIN users u ON t.id_users = u.id_users ORDER BY t.date_heure_message DESC');
                  ?>
                  <div class="other-tweet">
              <?php
// Ici on a tout le code php pour afficher les tweets 
                while($tweet = $t->fetch(PDO::FETCH_ASSOC)){
                  echo '<div class="tweet_content ' . $tweet['type'] .' ">';
                  echo '<div class="pseudo_message">';
// Ici j'ai ajouté des conditions, pour que si l'utilisateur est connecté à son compte, 
// il puisse cliquer sur les pseudos des autres utilisateurs sur les tweets pour aller sur leur page de profil . 
                  if(isset($_SESSION) && !empty($_SESSION)){
// Et donc à l'intérieur je vérifie que l'id user du tweet est différent de celui de la SESSION pour que l'utilisateur ne puisse pas cliquer sur ses propres tweets à lui
                    if($tweet['id_users'] != $_SESSION['user_id']){ 
                      //echo '<a href="user.php?profil='. $tweet['pseudo'] . '" class="pseudo_tweet lien-pseudo">'.$tweet['pseudo'].'</a>';
                      echo '<a href="user.php?profil='. $tweet['pseudo'] . '" class="pseudo_tweet lien-pseudo">
                              <span class="pseudo-text">' . $tweet['pseudo'] . '</span>
                            </a>';
                    } else {
                      echo '<span class="pseudo_tweet">'.$tweet['pseudo'].'</span>'; 
                    }
                  } else {
                      echo '<span class="pseudo_tweet">'.$tweet['pseudo'].'</span>';
                  }
                  echo '<span class="message_tweet">' .$tweet['message'] . '</span><br>';
// Ici on a une condition qui vérifie si il y'a bien une image qui accompagne le tweet pour pouvoir ensuite l'afficher 
                  if(isset($tweet['image_chemin']) && !empty($tweet['image_chemin'])) {
                    echo '<img src="' . $tweet['image_chemin'] . '" alt="" class="image-tweet">';
                  }
                  echo '</div>
                          <div class="heure_type">
                            <div class="date_supprimer">';
                  echo        $tweet['date_heure_message'] . '<br>';
                  echo     '</div>
                            <div class="type_response">';
                  echo        $tweet['type'];
                  echo      '</div>
                          </div>
                        </div>';
              } 
            ?>
        </div>
          </div>
<!-- Ici on retrouve les boutons de filtre que j'ai fais en deux fois pour m'aider pour le responsive -->
            <div class="last">
              <a href="inscription.php" class="deconnexion" id="deconnexion">Déconnexion</a>
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
      </div>
    <script src="app.js"></script>
    <script>

/* Ici je fais le localstorage uniquement pour la page d'accueil */
      var message = document.getElementById("message");
      var select = document.getElementById("nav_type");
      var form = document.getElementById("form-principal");

/* Je récupère les valeurs entrées dans le form, donc le message ainsi que le tag sélectionné */
      if(localStorage.getItem("tag")){
        select.value = localStorage.getItem("tag");
      }

      if(localStorage.getItem("texte")){
        message.value = localStorage.getItem("texte");
      }
/* Je remets les valeurs stockées dans le localstorage */
      select.addEventListener("input", function(){
        localStorage.setItem("tag", select.value);
      });

      message.addEventListener("input", function(){
        localStorage.setItem("texte", message.value);
      })

/* Je vide le localstorage une fois que le form a été envoyé */
      form.addEventListener("submit", function(event){
        localStorage.clear();
      })
    </script>
</body>
</html>