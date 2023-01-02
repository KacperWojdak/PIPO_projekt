<html>
<head>
<meta charset="utf-8">
<title>Player Deck</title>
<link rel="stylesheet" href="css/playerDeck.css">
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
</head>
<body>
    <div class="top">
        <h3>Choose your deck:</h3>
    </div>
    <div class="element">
        <ul class="face">
            <li data-text="FireBender" data-color="#b91a1a">
                <a class="fire"><img src="css/images/firebender_character.png"></a>
            </li>
            <li data-text="WaterBender" data-color="#1b59a0">
                <a class="water"><img src="css/images/waterbender_character.png"></a>
            </li>
            <li data-text="AirBender" data-color="#98c2bc">
                <a class="air"><img src="css/images/airbender_character.png"></a>
            </li>
            <li data-text="EarthBender" data-color="#6fe62b">
                <a class="earth"><img src="css/images/earthbender_character.png"></a>
            </li>
        </ul>
</div>


    <script>
        let list = document.querySelectorAll('.face li');
        let bg = document.querySelector('.element');
        list.forEach(elements => {
            elements.addEventListener('mouseenter', function(event) {
                let color = event.target.getAttribute('data-color');
                bg.style.backgroundColor = color;
            })
            elements.addEventListener('mouseleave', function(event) {
                bg.style.backgroundColor = '#ffe4c4';
            })
        })
    </script>

</body>
</html>