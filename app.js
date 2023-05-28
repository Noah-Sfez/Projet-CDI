//Je fais ici le système de filtre de tag, notamment grâce à l'élément data-tag présent sur mes boutons de tag 

const tweets = document.querySelectorAll(".tweet_content");
const buttons = document.querySelectorAll(".buttons-all");
console.log(tweets);
console.log(buttons);
buttons.forEach(Element => {
  Element.addEventListener("click", () => {
    let type = Element.getAttribute('data-tag');
    console.log(type);
    tweets.forEach(tweet => {
      if (tweet.classList.contains(type)){
        tweet.style.display = "block";
      } else {
        tweet.style.display = "none";
      }
    })
  })
})


// Ensuite je fais donc le bouton reset, qui consiste à juste afficher tous les tweets 
const resetButtonResp = document.getElementsByClassName("resetButton");
const resetButton = document.getElementsByClassName("resetButton noResp");


resetButtonResp[0].addEventListener("click", () => {

  tweets.forEach(tweet => {
    tweet.style.display = "block";
  });
});
// Je le fais deux fois pour mes deux boutons de reset qui m'aident notamment pour le responsive
resetButton[0].addEventListener("click", () => {
  tweets.forEach(tweet => {
    tweet.style.display = "block";
  });
});

const connect = document.querySelector('.modal-connect');
// Ici je permets de mettre une condition où si le modal de connexion existe, alors je fais fonctionner mon code qui fais apparaître le modal au scroll de l'utilisateur 
if(connect != null) {
  window.addEventListener('scroll', ()=>{
    if(window.scrollY > 500){
      console.log('scroll');
      connect.classList.add('scroll');
    }
  });
}

// Ici on a une grosse partie de code qui permet de changer les éléments de l'interface en fonction de la couleur du tag choisie
// Par exemple si vous appuyez sur sport, vous aurez le bouton du modal, le sélecteur des types ainsi que le bouton pour poster les tweets qui se mettront en rouge
const sportResp = document.getElementsByClassName("buttons-all sport");
const sport = document.getElementsByClassName("buttons-noresp sport");
const politiqueResp = document.getElementsByClassName("buttons-all politique");
const politique = document.getElementsByClassName("buttons-noresp politique");
const musiqueResp =document.getElementsByClassName("buttons-all musique");
const musique =document.getElementsByClassName("buttons-noresp musique");
const divertissementResp = document.getElementsByClassName("buttons-all divertissement");
const divertissement = document.getElementsByClassName("buttons-noresp divertissement");
const cinemaResp = document.getElementsByClassName("buttons-all cinema");
const cinema = document.getElementsByClassName("buttons-noresp cinema");
const voyageResp = document.getElementsByClassName("buttons-all voyage");
const voyage = document.getElementsByClassName("buttons-noresp voyage");
const cuisineResp = document.getElementsByClassName("buttons-all cuisine");
const cuisine = document.getElementsByClassName("buttons-noresp cuisine");
const artResp = document.getElementsByClassName("buttons-all art");
const art = document.getElementsByClassName("buttons-noresp art");
const typeTweet = document.getElementById("nav_type");
var btn = document.getElementById("myBtn");
var poster = document.getElementById("poster");
var deconnexion = document.getElementsByClassName("deconnexion");
var typeResponse = document.getElementsByClassName("type_response");

sportResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#E38181";
  typeTweet.style.borderColor = "#E38181";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#E38181";
  poster.style.borderColor = "#E38181";
  poster.style.color = "white";
}); 
sport[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#E38181";
  typeTweet.style.borderColor = "#E38181";
  typeTweet.style.color = "white";
  btn.style.backgroundColor = "#E38181";
  btn.style.borderColor = "#E38181";
  btn.style.color = "white";
  poster.style.backgroundColor = "#E38181";
  poster.style.borderColor = "#E38181";
  poster.style.color = "white";
}); 

politiqueResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#AC9F9F";
  typeTweet.style.borderColor = "#AC9F9F";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#AC9F9F";
  poster.style.borderColor = "#AC9F9F";
  poster.style.color = "white";
});
politique[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#AC9F9F";
  btn.style.borderColor = "#AC9F9F";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#AC9F9F";
  typeTweet.style.borderColor = "#AC9F9F";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#AC9F9F";
  poster.style.borderColor = "#AC9F9F";
  poster.style.color = "white";
});

musiqueResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#BE86B9";
  typeTweet.style.borderColor = "#BE86B9";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#BE86B9";
  poster.style.borderColor = "#BE86B9";
  poster.style.color = "white";
});
musique[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#BE86B9";
  btn.style.borderColor = "#BE86B9";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#BE86B9";
  typeTweet.style.borderColor = "#BE86B9";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#BE86B9";
  poster.style.borderColor = "#BE86B9";
  poster.style.color = "white";
});

divertissementResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#CFD492";
  typeTweet.style.borderColor = "#CFD492";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#CFD492";
  poster.style.borderColor = "#CFD492";
  poster.style.color = "white";
});
divertissement[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#CFD492";
  btn.style.borderColor = "#CFD492";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#CFD492";
  typeTweet.style.borderColor = "#CFD492";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#CFD492";
  poster.style.borderColor = "#CFD492";
  poster.style.color = "white";
  
});

cinemaResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#383638";
  typeTweet.style.borderColor = "#383638";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#383638";
  poster.style.borderColor = "#383638";
  poster.style.color = "white";
});
cinema[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#383638";
  btn.style.borderColor = "#383638";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#383638";
  typeTweet.style.borderColor = "#383638";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#383638";
  poster.style.borderColor = "#383638";
  poster.style.color = "white";
  
});

voyageResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#99D89C";
  typeTweet.style.borderColor = "#99D89C";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#99D89C";
  poster.style.borderColor = "#99D89C";
  poster.style.color = "white";
});
voyage[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#99D89C";
  btn.style.borderColor = "#99D89C";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#99D89C";
  typeTweet.style.borderColor = "#99D89C";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#99D89C";
  poster.style.borderColor = "#99D89C";
  poster.style.color = "white";
});

cuisineResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#999FD4";
  typeTweet.style.borderColor = "#999FD4";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#999FD4";
  poster.style.borderColor = "#999FD4";
  poster.style.color = "white";
});
cuisine[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#999FD4";
  btn.style.borderColor = "#999FD4";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#999FD4";
  typeTweet.style.borderColor = "#999FD4";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#999FD4";
  poster.style.borderColor = "#999FD4";
  poster.style.color = "white";
});

artResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#DEACE2";
  typeTweet.style.borderColor = "#DEACE2";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#DEACE2";
  poster.style.borderColor = "#DEACE2";
  poster.style.color = "white";
});
art[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#DEACE2";
  btn.style.borderColor = "#DEACE2";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#DEACE2";
  typeTweet.style.borderColor = "#DEACE2";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#DEACE2";
  poster.style.borderColor = "#DEACE2";
  poster.style.color = "white";
});

resetButtonResp[0].addEventListener("click", function() {
  typeTweet.style.backgroundColor = "#edeec9";
  typeTweet.style.borderColor = "#edeec9";
  typeTweet.style.color = "black";
  poster.style.backgroundColor = "#edeec9";
  poster.style.borderColor = "#edeec9";
  poster.style.color = "black";
});
resetButton[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#edeec9";
  btn.style.borderColor = "#edeec9";
  btn.style.color ="black";
  typeTweet.style.backgroundColor = "#edeec9";
  typeTweet.style.borderColor = "#edeec9";
  typeTweet.style.color = "black";
  poster.style.backgroundColor = "#edeec9";
  poster.style.borderColor = "#edeec9";
  poster.style.color = "black";
});

// Ici on retrouve le code de la side nav qui rajoute une classe à ma nav bar pour la faire glisser de la gauche vers la droite
// Et pendant ce temps on a aussi comme un filtre noir qui va apparaître pour foncer l'arrière plan
const navButton = document.querySelector('.button-menu');
const navBar = document.querySelector('.nav-bar');
const overlay = document.querySelector('.overlay');

navButton.addEventListener('click', function(){
  navBar.classList.toggle('active');
  overlay.classList.toggle('show');
})

// Ici on retrouve simplement le code pour ouvrir et fermer le modal 
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
  poster.style.display = "none";
}

span.onclick = function() {
  modal.style.display = "none";
  poster.style.display = "block";
}

// Ici je permet à l'utilisateur de pouvoir fermer le modal seulement en appuyant en dehors de celui-ci
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    poster.style.display = "block";
  }
}






