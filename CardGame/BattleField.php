<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/battlefield.css" type="text/css">
    <title>Fight</title>
</head>


<body>

    <?php

use CardGame\Classes\Board\Board;
use CardGame\MainCards\PlayerCardFire;
use CardGame\MainCards\PlayerCardWater;
use CardGame\MainCards\PlayerCardAir;
use CardGame\MainCards\PlayerCardEarth;

        $you=new PlayerCardWater;
        $notyou= new PlayerCardFire;
        $board= new Board($you,$notyou);


    
    ?>

</body>


</html>