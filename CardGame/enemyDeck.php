<html>
<head>
<meta charset="utf-8">
<title>Player Deck</title>
<link rel="stylesheet" href="CSS/enemyDeck.css">
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
</head>
<body>
    <div class="topic">
        <h3>Choose Enemy deck:</h3>
    </div>
    <div class="container">
        <div class="card active">
            <div class="circle">
                <div class="imgBox">
                    <img src="css/images/firebender_character.png">
                </div>
            </div>
            <div class="content"> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, porro maxime consectetur laboriosam laudantium in? Culpa corporis alias enim.</p>
                <button class="button">Choose</button>
            </div>
        </div>
        <div class="card">
            <div class="circle">
                <div class="imgBox">
                    <img src="css/images/waterbender_character.png">
                </div>
            </div>
            <div class="content"> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, porro maxime consectetur laboriosam laudantium in? Culpa corporis alias enim.</p>
                <button class="button">Choose</button>
            </div>
        </div>
        <div class="card">
            <div class="circle">
                <div class="imgBox">
                    <img src="css/images/airbender_character.png">
                </div>
            </div>
            <div class="content"> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, porro maxime consectetur laboriosam laudantium in? Culpa corporis alias enim.</p>
                <button class="button">Choose</button>
            </div>
        </div>
        <div class="card">
            <div class="circle">
                <div class="imgBox">
                    <img src="css/images/earthbender_character.png">
                </div>
            </div>
            <div class="content"> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, porro maxime consectetur laboriosam laudantium in? Culpa corporis alias enim.</p>
                <button class="button">Choose</button>
            </div>
        </div>
     </div>

     <div class="buttonContainer">
     <div class="buttonLeft"><a href="playerDeck.php"><button>Go Back</button></a></div>
        <div class="buttonRight"><a href="battleField.php"><button>FIGHT</button></a></div>
     </div>
     

     <script>
       let cards = document.querySelectorAll(".card"), active = null;
       cards.forEach(item => {
           item.addEventListener('click', function() {
               cards.forEach(btn => {
                   if (btn !== active) {
                       btn.classList.remove('active');                    
                       btn.classList.add('inactive');                    
                    }
               });
               this.classList.add('active');
               this.classList.remove('inactive');
               active = this;
           });
       });
    </script>

</body>
</html>